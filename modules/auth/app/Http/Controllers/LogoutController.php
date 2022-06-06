<?php

namespace Modules\auth\app\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Modules\auth\app\Actions\LogoutAction;

class LogoutController extends BaseController
{
    public function __invoke(Request $request)
    {
        (new LogoutAction)($request);

        return redirect()->route('login');
    }
}