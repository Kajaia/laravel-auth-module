<?php

namespace Modules\auth\app\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Modules\auth\app\Actions\LoginUserAction;

class LoginController extends BaseController
{
    public function __invoke(Request $request)
    {
        (new LoginUserAction)($request);

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.'
        ])->onlyInput('email');
    }
}
