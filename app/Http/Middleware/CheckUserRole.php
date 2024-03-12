<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;


class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {

        $user = Auth::user();

        // Check if user is logged in and has the required role
        if ($user && $user->hasAnyRole(...$roles)) {
            return $next($request);
        }

        // Redirect or throw an unauthorized exception
        // return redirect()->route('visitor.home')->with('error', 'Unauthorized access.');
        return redirect()->back()->with('error', 'Unauthorized access.');

        // return $next($request);
    }
}
