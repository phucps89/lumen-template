<?php

namespace App\Services\UserLoggedIn;

use App\Entities\User\User;
use App\Services\UserLoggedIn\Src\UserLoggedInService;
use Illuminate\Support\Facades\Facade;
use Tymon\JWTAuth\Token;

/**
 * Created by PhpStorm.
 * Account: phuctran
 * Date: 09/02/2017
 * Time: 10:02
 */

/**
 * Class UserLoggedInFacade
 *
 * @method static User getUser()                    Get Model Account
 * @method static Token getToken()                  Get Token
 *
 * @package App\Services\UserLoggedIn
 */
class UserLoggedInFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return UserLoggedInService::class;
    }
}