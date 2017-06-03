<?php

namespace App\Http\Middleware;

use Closure;
use Role;

class admin
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
      if (Role::admin()) {
        return $next($request);
      }

      return redirect('/');
    }
}
