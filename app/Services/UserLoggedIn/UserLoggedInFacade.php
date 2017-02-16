<?php

namespace App\Services\UserLoggedIn;

use App\Entities\User\User;
use App\Services\UserLoggedIn\Src\UserLoggedInService;
use Illuminate\Support\Facades\Facade;

/**
 * Created by PhpStorm.
 * User: phuctran
 * Date: 09/02/2017
 * Time: 10:02
 */

/**
 * Class UserLoggedInFacade
 *
 * @method static User getUser()                    Get Model User
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