<?php

namespace Modules\auth\app\Http\Controllers;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class EmailVerificationController extends BaseController
{

    public function verify(EmailVerificationRequest $request)
    {
        $request->fulfill();
     
        return redirect()
            ->route('dashboard')
            ->with('message', 'Email verified successfully!');
    }

    public function resend(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();
        
        return back()->with('message', 'Verification link sent!');
    }

}