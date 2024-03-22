<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::check()) {
            return redirect()->back();
         }
        return view('login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('phone', 'password');
        $remember = $request->has('remember');
        if(Auth::attempt($credentials, $remember)){
            if (Auth::user()->hasAnyRole(['admin'])) {
                return redirect()->route('admin.home');
            }elseif (Auth::user()->hasAnyRole(['reception'])) {
                return redirect()->route('reception.home');
            } else {
                return redirect()->route('visitor.home');
            }

        }
        else {

            return redirect()->route('login')->withErrors(['error' => 'فشلت عملية المصادقة. يرجى التحقق من بيانات الحساب الخاصة بك.']);
        }
    }
}
