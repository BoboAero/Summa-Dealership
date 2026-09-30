<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class roleCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next, $roleName): Response
    {
        $user = Auth::user();
        if ($user === null) {
            return redirect()->route('dashboard');
        }
        $role = str_replace(' ', '', strtolower($user->Role->name));

        if ($role !== $roleName && $role !== 'manager'){
            if ($roleName === 'monteur' && $role === 'hoofdmonteur'){
                return $next($request);
            }
            else if ($roleName === 'verkoper' && $role === 'hoofdverkoper'){
                return $next($request);
            } else {
                return redirect()->route('dashboard');
            }
        }
        return $next($request);
    }
}
