<?php

namespace App\Http\Entry\Requests;

use Lang;
use Illuminate\Foundation\Http\FormRequest;

class EntryFormStep1Requests extends FormRequest {
    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            "full_name" => ["required", "min:3", "max:100"],
            "phone_number" => ["required", "digits:8"]
        ];
    }

    public function messages() {
        return [
            "full_name.required" => Lang::get("validation.required", ["attribute" => Lang::get("dashboard.entry_form.step_1.full_name.label")]),
            "full_name.min" => Lang::get("validation.min.string", ["attribute" => Lang::get("dashboard.entry_form.step_1.full_name.label"), "min" => 3]),
            "full_name.max" => Lang::get("validation.max.string", ["attribute" => Lang::get("dashboard.entry_form.step_1.full_name.label"), "max" => 100]),
            "phone_number.required" => Lang::get("validation.required", ["attribute" => Lang::get("dashboard.entry_form.step_1.phone_number.label")]),
            "phone_number.numeric" => Lang::get("validation.numeric", ["attribute" => Lang::get("dashboard.entry_form.step_1.phone_number.label")]),
            "phone_number.digits" => Lang::get("validation.digits", ["attribute" => Lang::get("dashboard.entry_form.step_1.phone_number.label", ["digits" => 8])]),
        ];
    }
}
