<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class LogoutController extends Controller
{
    //
    public function logout()
    {
        Auth::logout();
        return redirect()->route('landing.page');
    }
}
