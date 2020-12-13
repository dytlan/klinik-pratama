<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;

use Closure;

class isDokterMiddleware
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
        if($user->role->nama == 'admin' || $user->role->nama == 'dokter' || $user->role->nama == 'bidan'){
            return $next($request);
        }
        return redirect()->back()->with('error', 'Not Authorized.');
    }
}
