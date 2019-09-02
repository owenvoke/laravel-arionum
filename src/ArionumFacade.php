<?php

namespace pxgamer\LaravelArionum;

use Illuminate\Support\Facades\Facade;

/** @see \pxgamer\Arionum\Arionum */
final class ArionumFacade extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'arionum';
    }
}
