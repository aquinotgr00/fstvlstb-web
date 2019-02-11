<?php

namespace Modules\Admins\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function showLoginForm()
    {
        return view('admins::login');
    }

    public function redirectTo()
    {
        return route('admins.dashboard');
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }
}
