<?php

namespace App\Http\Middleware\roles;

use App\Enums\UserRole;
use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Http\Request;

class Dispatcher
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $role = Auth::user()->role;

        if ($role->value === UserRole::ADMIN || $role->value === UserRole::DISPATCHER) {
            return $next($request);
        }

        abort(404);
    }
}
