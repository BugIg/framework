<?php

namespace AvoRed\Framework\User\Middleware;

use Closure;
use AvoRed\Framework\Database\Contracts\CurrencyModelInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class Permission
{
    /**
     * Handle an incoming request.
     *
     * @param Request  $request
     * @param Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::guard('admin')->user();
        $routeName = Route::currentRouteName();
        if ($user->hasPermission($routeName)) {
            return $next($request);
        }

        abort(403, 'Sorry you don\'t have permission to access this area');
    }
}
