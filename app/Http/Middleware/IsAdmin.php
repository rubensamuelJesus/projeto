<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsAdmin
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
        //$user_pedido = $request->route('user');
        if (Auth::user() &&  Auth::user()->admin == 1) {
                return $next($request);
         }
        return redirect('/');


/*
         if (Auth::()!=$user_pedido->id &&  Auth::user()->admin == 1) {
                return response('Unauthorized',401);
         }
                return response('Unauthorized',401);
*/
        //return $next($request);
    }

}
