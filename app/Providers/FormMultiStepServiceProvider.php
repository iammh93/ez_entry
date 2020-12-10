<?php

namespace App\Providers;

use App\EzFramework\FormMultiSteps\Routing\PendingMultiSteps;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class FormMultiStepServiceProvider extends ServiceProvider {
    /**
     * Register services.
     *
     * @return void
     */
    public function register() {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot() {
        Route::macro("multistep", function ($uri, $controller) {
            return new PendingMultiSteps($uri, $controller);
        });
    }
}
