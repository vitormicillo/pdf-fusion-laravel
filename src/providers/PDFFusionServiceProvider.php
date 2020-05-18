<?php

namespace Doode\PDFFusionLaravel\Providers;

use Illuminate\Support\ServiceProvider;
use Doode\PDFFusionLaravel\PDFFusion;

class PDFFusionServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
      $this->app->singleton('PDFFusion', function ($app) {
          $pdffusion = new PDFFusion($app['files']);
          return $pdffusion;
      });
    }
}
