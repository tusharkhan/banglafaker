<?php

namespace Tusharkhan\BanglaFaker;

use Illuminate\Support\Facades\Facade;

class BanglaFakerFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'banglaFaker';
    }
}
