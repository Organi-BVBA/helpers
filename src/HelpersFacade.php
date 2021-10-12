<?php

namespace Organi\Helpers;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Organi\Helpers\Helpers
 */
class HelpersFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'helpers';
    }
}
