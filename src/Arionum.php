<?php

namespace pxgamer\LaravelArionum;

use Illuminate\Support\Facades\Facade;

/** @see \pxgamer\Arionum\Arionum */
final class Arionum extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'arionum';
    }
}
