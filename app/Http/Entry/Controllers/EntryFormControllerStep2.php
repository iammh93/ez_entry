<?php

namespace App\Http\Entry\Controllers;

use DB, Lang;
use App\Domain\Steps\Steps;
use App\Http\Controllers\Controller;

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
        //$temperature = mt_rand(57*10, 58*10) / 10;
        $temperature = 38;
        $steps->step("entry.entry-form", 2)
            ->store(["temperature" => $temperature])
            ->complete();
        return redirect()->route("entry.entry-form.3.index");
    }
}
