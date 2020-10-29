<?php

namespace Doode\PdfFusionLaravel\Facades;

use \Illuminate\Support\Facades\Facade;

class PdfFusionFacade extends Facade {

  protected static function getFacadeAccessor() {
      return 'PdfFusionLaravel';
  }

}
