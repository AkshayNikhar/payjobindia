<?php

namespace App\Http\Middleware;

namespace Modules\Themes\Http\Middleware;

use Closure;

class EmployerAdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::guard('webadmin')->user() || Auth::guard('web')->user()) {
            return $next($request);
        } else {
            return redirect()->route('employer-login')->with('status', 'Please Login First!!');
        }
    }
}
