<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\VisitorsData;

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
            $user = Auth::user(); // Retrieve the authenticated user

            // Check if the user has the "visitor" role
            if ($user->hasAnyRole(['visitor'])) {
                $visitorData = $user->VisitorsData;

                // Check if the visitor's status is "active"
                if ($visitorData && $visitorData->status === 'active') {
                    // Redirect to visitor's home page
                    return redirect()->route('visitor.home');
                } else {
                    // Redirect with error message if status is not "active"
                    return redirect()->route('login')->withErrors(['error' => 'حسابك غير نشط.']);
                }
            } elseif ($user->hasAnyRole(['admin'])) {
                return redirect()->route('admin.home');
            } elseif ($user->hasAnyRole(['reception'])) {
                return redirect()->route('reception.home');
            } else {
                return redirect()->route('login')->withErrors(['error' => 'فشلت عملية المصادقة. يرجى التحقق من بيانات الحساب الخاصة بك.']);
            }
        } else {
            return redirect()->route('login')->withErrors(['error' => 'فشلت عملية المصادقة. يرجى التحقق من بيانات الحساب الخاصة بك.']);
        }
    }
}
