<?php

namespace App\Services\Response;

use App\Services\Response\Src\ResponseService;
use Illuminate\Support\Facades\Facade;

/**
 * Created by PhpStorm.
 * User: phuctran
 * Date: 20/01/2017
 * Time: 13:14
 */
class ResponseFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return ResponseService::class;
    }
}