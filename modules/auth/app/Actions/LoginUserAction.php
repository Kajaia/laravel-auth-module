<?php

namespace Modules\auth\app\Actions;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\auth\app\Http\Requests\LoginRequest;

class LoginUserAction
{

    public function __invoke(Request $request)
    {
        $user = $request->validate((new LoginRequest())->rules());

        if(Auth::attempt($user, $request->boolean('remember'))) {
            $request->session()->regenerate();

            return redirect()->route('dashboard');
        }
    }

}