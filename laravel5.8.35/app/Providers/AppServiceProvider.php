<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
// @author: ledinhbinh
use Illuminate\Database\Schema\Builder; // Import Builder

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
     // @author: ledinhbinh
      public function boot()
      {
          Builder::defaultStringLength(191); // Update defaultStringLength
      }
}
