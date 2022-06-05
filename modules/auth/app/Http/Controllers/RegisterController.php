<?php

namespace Modules\auth\app\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Modules\auth\app\Actions\RegisterUserAction;

class RegisterController extends BaseController
{
    public function __invoke(Request $request)
    {
        (new RegisterUserAction)($request);

        return redirect()->route('dashboard');
    }
}
