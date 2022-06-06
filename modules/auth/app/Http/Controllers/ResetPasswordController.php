<?php

namespace Modules\auth\app\Http\Controllers;

use Illuminate\Support\Facades\Password;
use Illuminate\Routing\Controller as BaseController;
use Modules\auth\app\Actions\UpdatePasswordAction;
use Modules\auth\app\Http\Requests\ResetPasswordRequest;
use Modules\auth\app\Http\Requests\UpdatePasswordRequest;

class ResetPasswordController extends BaseController
{

    public function request(ResetPasswordRequest $request)
    {
        $status = Password::sendResetLink($request->only('email'));
        
        return $status === Password::RESET_LINK_SENT
            ? back()->with(['message' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }

    public function reset($token)
    {
        return view('auth::auth.reset-password', ['token' => $token]);
    }

    public function update(UpdatePasswordRequest $request)
    {
        $status = (new UpdatePasswordAction)($request);
        
        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('message', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }

}