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
        $role = strtolower($user->Role->name);

        if ($role !== $roleName && $role !== 'manager'){
            echo "You do not have permission to access this page, need role " . $roleName . " or higher.";
            echo "Current role: " . $user->Role->name;
            return redirect()->route('dashboard');
        }
        return $next($request);
    }
}
