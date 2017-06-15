<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\App;

class RoleServiceProvider extends ServiceProvider
{

    public function boot()
    {
        //
    }

    public function register()
    {
      App::bind('role', function()
      {
        return new \App\Classes\Role;
      });
    }
}
