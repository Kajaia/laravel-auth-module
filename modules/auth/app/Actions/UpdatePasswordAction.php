<?php

namespace Modules\auth\app\Actions;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Modules\auth\app\Http\Requests\UpdatePasswordRequest;

class UpdatePasswordAction
{

    public function __invoke(UpdatePasswordRequest $request)
    {
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));
        
                $user->save();
        
                event(new PasswordReset($user));
            }
        );

        return $status;
    }

}