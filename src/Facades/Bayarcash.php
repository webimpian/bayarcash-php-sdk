<?php

namespace Webimpian\BayarcashSdk\Facades;

use Webimpian\BayarcashSdk\Bayarcash as BayarcashSdk;
use Illuminate\Support\Facades\Facade;

class Bayarcash extends Facade
{
    public static function getFacadeAccessor()
    {
        return BayarcashSdk::class;
    }
}
