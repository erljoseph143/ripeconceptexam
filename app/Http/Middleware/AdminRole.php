<?php

namespace App\Http\Middleware;

use Closure;

class AdminRole
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
        if($request->user() && $request->user()->user_type != 'admin')
        {
            $url = url('home');
            return redirect($url)->with(['not_admin'=>'Sorry you are not an Administrator.']);
        }

        return $next($request);
    }
}
