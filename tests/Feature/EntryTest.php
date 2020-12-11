<?php

namespace Tests\Feature;

use Lang;
use Tests\TestCase;
use App\Domain\Users\Models\User;

class EntryTest extends TestCase {
    public function testEntryFormCannotLeaveBlank() {
        $expected_results = [
            "full_name" => [
                Lang::get("validation.required", ["attribute" => Lang::get("dashboard.entry_form.step_1.full_name.label")])
            ],
            "phone_number" => [
                Lang::get("validation.required", ["attribute" => Lang::get("dashboard.entry_form.step_1.phone_number.label")])
            ],
        ];

        $input_data = [];
        $this->sendRequestByRoute("POST", route("entry.entry-form.1.store"), $input_data);
        $this->assertValidationErrorMessages($expected_results);
    }

    public function testEntryFormFullNameCannotExceedLength() {
        $expected_results = [
            "full_name" => [
                Lang::get("validation.max.string", ["attribute" => Lang::get("dashboard.entry_form.step_1.full_name.label"), "max" => 100])
            ],
        ];

        $input_data = [
            "full_name" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the i",
            "phone_number" => 28375932
        ];

        $this->sendRequestByRoute("POST", route("entry.entry-form.1.store"), $input_data);
        $this->assertValidationErrorMessages($expected_results);
    }

    public function testEntryFormFullNameCannotLessThanLength() {
        $expected_results = [
            "full_name" => [
                Lang::get("validation.min.string", ["attribute" => Lang::get("dashboard.entry_form.step_1.full_name.label"), "min" => 3])
            ],
        ];

        $input_data = [
            "full_name" => "Lo",
            "phone_number" => 28375932
        ];

        $this->sendRequestByRoute("POST", route("entry.entry-form.1.store"), $input_data);
        $this->assertValidationErrorMessages($expected_results);
    }

    public function testEntryFormPhoneNumberMustExactlySameDigits() {
        $expected_results = [
            "phone_number" => [
                Lang::get("validation.digits", ["attribute" => Lang::get("dashboard.entry_form.step_1.phone_number.label"), "digits" => 8])
            ],
        ];

        $input_data = [
            "full_name" => "Testing User",
            "phone_number" => 123456789
        ];

        $this->sendRequestByRoute("POST", route("entry.entry-form.1.store"), $input_data);
        $this->assertValidationErrorMessages($expected_results);
    }
}
