<?php

namespace App\Http\Middleware;

use Closure;
use Role;

class admin
{
    public function handle($request, Closure $next)
    {
      if (Role::admin()) {
        return $next($request);
      }

      return redirect('/');
    }
}
