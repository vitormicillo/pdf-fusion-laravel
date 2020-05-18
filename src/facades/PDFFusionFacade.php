<?php

namespace Doode\PDFFusionLaravel\Facades;

use \Illuminate\Support\Facades\Facade;


class PDFFusionFacade extends Facade {

  protected static function getFacadeAccessor() {
      return 'PDFFusion';
  }

}
