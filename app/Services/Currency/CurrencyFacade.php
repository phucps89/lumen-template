<?php

namespace App\Services\Currency;

use App\Services\Currency\Src\CurrencyService;
use Illuminate\Support\Facades\Facade;

/**
 * Created by PhpStorm.
 * User: Phuc
 * Date: 2/14/2017
 * Time: 11:11 AM
 */

/**
 * Class CurrencyFacade
 *
 * @method static formatUSD(float $value)
 *
 * @package App\Services\Currency
 */
class CurrencyFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return CurrencyService::class;
    }
}