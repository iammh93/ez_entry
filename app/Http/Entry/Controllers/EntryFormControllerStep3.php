<?php

namespace App\Http\Entry\Controllers;

use DB, Lang;
use App\Domain\Steps\Steps;
use App\Http\Controllers\Controller;

class EntryFormControllerStep3 extends Controller {
    public function index(Steps $steps) {
        $step = $steps->step("entry.entry-form", 3);

        if ($step->notCompleted(2)) {
            dd(Lang::get("dashboard.entry_form.step_3.errors.second_step"));
        }

        return view("entry.step_3")->with([
            "step" => $step->all()
        ]);
    }

    public function store(Steps $steps) {
        $steps->step("entry.entry-form", 3);
        $steps->clearAllData();
        return redirect()->route("entry.entry-form.1.index");
    }
}
