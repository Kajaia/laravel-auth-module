<?php

namespace Modules\auth\app\Http\Controllers;

use Modules\auth\app\Http\Requests\LoginRequest;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends BaseController
{
    public function __invoke(Request $request)
    {
        $user = $request->validate((new LoginRequest)->rules());

        if(Auth::attempt($user)) {
            $request->session()->regenerate();

            return redirect()->route('dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.'
        ])->onlyInput('email');
    }
}
