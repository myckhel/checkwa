<?php

namespace Myckhel\Checkwa;

use Illuminate\Support\ServiceProvider;

class CheckwaServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
      $this->mergeConfigFrom(__DIR__.'/../config/checkwa.php', 'checkwa');

      // Register the service the package provides.
      $this->app->singleton('checkwa', function ($app) {
          return new Checkwa;
      });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['checkwa'];
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
      // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'myckhel');
      // $this->loadViewsFrom(__DIR__.'/../resources/views', 'myckhel');
      // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
      // $this->loadRoutesFrom(__DIR__.'/routes.php');

      // Publishing is only necessary when using the CLI.
      if ($this->app->runningInConsole()) {
          $this->bootForConsole();
      }
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/checkwa.php' => config_path('checkwa.php'),
        ], 'checkwa.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/myckhel'),
        ], 'checkwa.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/myckhel'),
        ], 'checkwa.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/myckhel'),
        ], 'checkwa.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
