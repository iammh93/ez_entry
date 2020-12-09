<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestTraits\BaseTestHelperTrait;

abstract class TestCase extends BaseTestCase {
    use BaseTestHelperTrait;
    use CreatesApplication, RefreshDatabase;

    protected $createTestUser = false;
    protected $user = null;
}
