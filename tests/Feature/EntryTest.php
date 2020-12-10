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
            "full_name" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the i"
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
            "full_name" => "Lo"
        ];

        $this->sendRequestByRoute("POST", route("entry.entry-form.1.store"), $input_data);
        $this->assertValidationErrorMessages($expected_results);
    }
}
