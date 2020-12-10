<?php

namespace App\EzFramework\FormMultiSteps\Controllers;

use Illuminate\Http\Request;

class FormMultiStepRedirectController {
    public function __invoke(Request $request) {
        return redirect($request->getUri() . '/1');
    }
}
