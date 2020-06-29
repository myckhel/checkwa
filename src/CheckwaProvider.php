<?php

namespace Whatsnum\Checkwa;

use Illuminate\Support\ServiceProvider;

class CheckwaProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
      $this->publishes([
          __DIR__.'/../config/checkwa.php' => config_path('checkwa.php')
      ], 'config');

      // $this->publishes([
      //     __DIR__.'/../database/migrations/' => database_path('migrations')
      // ], 'migrations');
    }
}
