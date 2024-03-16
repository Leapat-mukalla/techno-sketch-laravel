<?php

namespace App\Services;


use Illuminate\Support\Facades\Auth;

class AccountService
{
    public static function getCurrentUserName()
    {
        $user = Auth::user();
        if ($user) {
            return $user->name;
        }
        return null;

    }


}
