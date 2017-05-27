<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema; //Import Schema

class AppServiceProvider extends ServiceProvider
{

    public function boot()
    {
      Schema::defaultStringLength(191);
      view()->composer('questions.partials.categories', function($view){
        $view->with('categories', \App\Category::getCategories());
      });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
