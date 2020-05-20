<?php

namespace Doode\PdfFusionLaravel\Providers;

use Illuminate\Support\ServiceProvider;
use Doode\PdfFusionLaravel\PdfFusion;

class PdfFusionServiceProvider extends ServiceProvider
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
      $this->app->singleton('PdfFusion', function ($app) {
          $PdfFusion = new PdfFusion($app['files']);
          return $PdfFusion;
      });
    }
}
