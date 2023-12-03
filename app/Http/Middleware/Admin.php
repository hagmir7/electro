<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(auth()->user()){
            if(auth()->user()->role == 'Admin' ){
                return $next($request);
            }else{
                return abort(404);
            }
        }else{
            $next = request()->path();
            return redirect('/user/login?next=/'.$next);
        }
    }
}
