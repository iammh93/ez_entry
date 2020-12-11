<?php

namespace App\Http\Dashboard\Controllers;

use App\Http\Controllers\Controller;
use App\Domain\Users\Models\Entry;

class DashboardController extends Controller {
    public function index() {
        return redirect()->route("entry.entry-form.1.index");
    }

    public function getEntryList() {
        $entries = Entry::orderBy("checkin_date", "desc")->get();

        return view("dashboard")->with([
            "entries" => $entries
        ]);
    }
}
