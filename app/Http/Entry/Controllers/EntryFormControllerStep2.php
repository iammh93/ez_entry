<?php

namespace App\Http\Entry\Controllers;

use Exception, DB, Lang;
use App\Domain\Steps\Steps;
use App\Http\Controllers\Controller;
use App\Domain\Users\Models\Entry;

class EntryFormControllerStep2 extends Controller {
    public function index(Steps $steps) {
        $step = $steps->step("entry.entry-form", 2);

        if ($step->notCompleted(1)) {
            dd(Lang::get("dashboard.entry_form.step_2.errors.first_step"));
        }

        return view("entry.step_2")->with([
            "step" => $step->all()
        ]);
    }

    public function store(Steps $steps) {
        //assuming temperature was passed by Stepper Control
        $temperature = mt_rand(37*10, 38*10) / 10;
        $steps->step("entry.entry-form", 2)
            ->store(["temperature" => $temperature])
            ->complete();

        $data = $steps->all();
        $data["checkin_date"] = $data["checkin_date"]->setTimezone('UTC');

        DB::beginTransaction();
        try {
            $entry = new Entry();
            $entry->fill($data);
            $entry->save();

            DB::commit();
            return redirect()->route("entry.entry-form.3.index");
        } catch (Exception $e) {
            DB::rollback();
            dd($e->getMessage());
        }
    }
}
