<?php
namespace App\Http\Middleware;

use Illuminate\Http\Request;

use Closure;
use Auth;

class CheckUserBlock
{
    // public function handle($request, Closure $next)
    // {
    //     if (auth()->check() && auth()->user()->blocked) {
        
    //         return back()->with('error', __('Account is blocked'));
    //     }

    //     return $next($request);
    // }
    
    public function handle(Request $request, Closure $next)
        {
            if(auth()->check() && (auth()->user()->blocked == 1)){
                    Auth::logout();
        
                    $request->session()->invalidate();
        
                    $request->session()->regenerateToken();
        
                    return redirect()->route('login')->with('error', 'Your Account is suspended, please contact Admin.');
        
            }
        
            return $next($request);
        }
}