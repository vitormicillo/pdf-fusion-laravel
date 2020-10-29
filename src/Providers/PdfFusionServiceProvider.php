<?php

namespace Doode\PdfFusionLaravel\Providers;

use Illuminate\Support\ServiceProvider;
use Doode\PdfFusionLaravel\PdfFusionLaravel;

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
      $this->app->singleton('PdfFusionLaravel', function ($app) {
          $PdfFusion = new PdfFusionLaravel($app['files']);
          return $PdfFusion;
      });
    }
}
