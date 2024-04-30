<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class EmployerAdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::guard('empadmin')->empuser()) {
            // return $next($request);
            return redirect('company/dashboard');
        } else {
            return redirect()->route('employer-login');
        }
    }
    
}
