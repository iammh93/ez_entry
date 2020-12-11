<?php

namespace Tests\TestTraits;

use App\Domain\Users\Models\User;
use Illuminate\Support\Facades\Hash;
use Log;

trait BaseTestHelperTrait {
    protected function getSessionErrorMessagesInArray() {
        if (session('errors')) {
            return session('errors')->getMessages();
        }
        return null;
    }

    public function assertValidationErrorMessages($expected_results) {
        $response = $this->getSessionErrorMessagesInArray();
        $this->assertEquals($expected_results, $response);
    }

    protected function sendRequestByRoute($method, $uri, $parameters = [], $status_code = 200, $files = [], $routeParameters = [], $headers = []) {

        $response = $this->call(
            $method,
            $uri,
            $parameters,
            [],
            $files
            );

        $errors = $this->getSessionErrorMessagesInArray();

        if ($errors) {
            return $errors;
        }

        if ($response->headers->get('Content-Type') === "application/json") {
            return json_decode($response->content(), true);
        }

        if (!$response->isRedirection()) {
            $this->assertEquals($status_code, $response->getStatusCode(), $response->getContent());
        }

        if ($response->isRedirection()){
            return $response;
        }
    }

    protected function generateTestData($test_data = []) {
        return array_merge($this->default_test_data, $test_data);
    }

    protected function createTestUser($overwrite = []) {
        $data = [
            "name" => "testuser",
            "email" => "testing@gmail.com",
            "password" => "password"
        ];

        $user_data = array_merge($data, $overwrite);
        $user_data["password"] = Hash::make($user_data["password"]);
        $user = (new User)->fill($user_data);
        $user->save();

        return $user;
    }

    public function assertNestedObjects($expected_results, $results, $excluded_keys = []) {
        foreach($expected_results as $index => $expected) {
            if (is_array($expected) || is_object($expected)) {
                $this->assertNestedObjects($expected, $results[$index], $excluded_keys);
                continue;
            }
            if (in_array($index, $excluded_keys) == false) {
                $this->assertEquals($expected, $results[$index], "Column: " . $index);
            }
        }
    }
}
