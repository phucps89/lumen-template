<?php

namespace App\Services\Response;

use App\Services\Response\Src\ResponseService;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Facade;

/**
 * Created by PhpStorm.
 * Account: phuctran
 * Date: 20/01/2017
 * Time: 13:14
 */

/**
 * Class ResponseFacade
 *
 * @method static mixed send(string|array|object $result = null, int $statusCode = Response::HTTP_OK)
 * @method static mixed download(string $path)
 * @method static displayFromS3(string $pathOnS3)
 *
 * @package App\Services\Response
 */
class ResponseFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return ResponseService::class;
    }
}