<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;

use Closure;

class isResepsionisMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::user();
        if($user->role->nama == 'admin' || $user->role->nama == 'resepsionis'){
            return $next($request);
        }
        return redirect()->back()->with('error', 'Not Authorized.');
    }
}
