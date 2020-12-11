<?php

namespace App\Http\Dashboard\Controllers;

use App\Http\Controllers\Controller;

class DashboardController extends Controller {
    public function index() {
        return redirect()->route("entry.entry-form.1.index");
    }
}
