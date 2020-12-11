<?php

namespace App\Http\Entry\Controllers;

use DB, Lang;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Domain\Steps\Steps;
use App\Http\Entry\Requests\EntryFormStep1Requests;

class EntryFormControllerStep1 extends Controller {
    public function index(Steps $steps) {
        $step = $steps->step("entry.entry-form", 1);
        return view("entry.step_1")->with([
            "step" => $step
        ]);
    }

    public function store(Steps $steps, EntryFormStep1Requests $requests) {
        $data = [
            "full_name" => $requests->get("full_name"),
            "phone_number" => $requests->get("phone_number"),
            "checkin_date" => Carbon::now()->setTimezone("Asia/Singapore")
        ];

        $steps->step("entry.entry-form", 1)
            ->store($data)
            ->complete();
        return redirect()->route("entry.entry-form.2.index");
    }
}
