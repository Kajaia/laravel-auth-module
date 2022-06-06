<?php

namespace Modules\auth\app\Actions;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Modules\auth\app\Http\Requests\RegisterRequest;

class RegisterUserAction
{

    public function __invoke(Request $request)
    {
        $request->validate((new RegisterRequest)->rules());

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        auth()->login($user);

        event(new Registered($user));
    }

}