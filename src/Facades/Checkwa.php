<?php

namespace Myckhel\Checkwa\Facades;

use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Facades\Http;
use Myckhel\Checkwa\Traits\HasQuery;
use Myckhel\Checkwa\Traits\Request;

class Checkwa extends Facade
{
  use Request, HasQuery;
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'checkwa';
    }
}
