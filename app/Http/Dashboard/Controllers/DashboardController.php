<?php

namespace App\Http\Dashboard\Controllers;

use App\Domain\Users\Models\Entry;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller {
    const ORDER_BY_ASC = "asc";
    const ORDER_BY_DESC = "desc";

    public function index() {
        return redirect()->route("entry.entry-form.1.index");
    }

    public function getEntryList(Request $requests) {
        $order_by = "desc";
        $entries = Entry::query();
        $filter_by = [];
        //default
        if ($requests->get("temperature") === null && $requests->get("checkin_date") === null) {
            $entries->orderByCustomAttribute("checkin_date", self::ORDER_BY_DESC);
            array_push($filter_by, "Check In Date: Descending");
        }

        if ($requests->get("temperature") !== null) {
            if ($requests->get("temperature") === self::ORDER_BY_DESC) {
                $entries->orderByCustomAttribute("temperature", self::ORDER_BY_DESC);
                array_push($filter_by, "Temperature: Descending");
            }

            if ($requests->get("temperature") === self::ORDER_BY_ASC) {
                $entries->orderByCustomAttribute("temperature", self::ORDER_BY_ASC);
                array_push($filter_by, "Temperature: Ascending");
            }
        }

        if ($requests->get("checkin_date") !== null) {
            if ($requests->get("checkin_date") === self::ORDER_BY_DESC) {
                $entries->orderByCustomAttribute("checkin_date", self::ORDER_BY_DESC);
                array_push($filter_by, "Check In Date: Descending");
            }

            if ($requests->get("checkin_date") === self::ORDER_BY_ASC) {
                $entries->orderByCustomAttribute("checkin_date", self::ORDER_BY_ASC);
                array_push($filter_by, "Check In Date: Ascending");
            }
        }

        $invalid_entries = (clone $entries)->where("temperature", ">=" , 37.5)->get();
        $valid_entries = (clone $entries)->where("temperature", "<" , 37.5)->get();

        return view("dashboard")->with([
            "valid_entries" => $valid_entries,
            "invalid_entries" => $invalid_entries,
            "filter_by" => $filter_by
        ]);
    }
}
