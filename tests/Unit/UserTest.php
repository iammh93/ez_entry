<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Domain\Users\Models\User;

class UserTest extends TestCase {
    public function testCreateNewUser() {
        $this->createTestUser();

        $expected_results = [
            "name" => "testuser",
            "email" => "testing@gmail.com"
        ];
        $this->assertNestedObjects($expected_results, User::first());
    }
}
