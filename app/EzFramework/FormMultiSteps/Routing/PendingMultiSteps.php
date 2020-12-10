<?php

namespace App\EzFramework\FormMultiSteps\Routing;

use App\EzFramework\FormMultiSteps\Controllers\FormMultiStepRedirectController;
use Illuminate\Support\Facades\Route;

class PendingMultiSteps {
    protected $steps;
    protected $uri;
    protected $name;
    protected $controller;

    public function __construct($uri, $controller) {
        $this->uri = $uri;
        $this->controller = $controller;
    }

    public function steps($steps) {
        $this->steps = $steps;
        return $this;
    }

    public function name($name) {
        $this->name = $name;
        return $this;
    }

    public function __destruct() {
        Route::get($this->uri, "\\" . FormMultiStepRedirectController::class);

        collect()->times($this->steps, function($step) {
            Route::group([
                "prefix" => $this->uri,
            ], function() use ($step) {
                Route::resource($step, "{$this->controller}Step{$step}")
                    ->only(["index", "store"])
                    ->names([
                        "index" => "{$this->name}.{$step}.index",
                        "store" => "{$this->name}.{$step}.store"
                    ]);
            });
        });
    }
}
