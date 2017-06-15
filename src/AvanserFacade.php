<?php namespace Wheredidgogogo\Avanser;

use Illuminate\Support\Facades\Facade;

class AvanserFacade extends Facade {

    protected static function getFacadeAccessor() {
        return 'wheredidgogogo-avanser';
    }

}