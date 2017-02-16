<?php

namespace App\Services\S3;

use App\Services\S3\Src\S3Service;
use Illuminate\Support\Facades\Facade;

/**
 * Created by PhpStorm.
 * User: phuctran
 * Date: 19/01/2017
 * Time: 15:20
 */
class S3Facade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return S3Service::class;
    }
}