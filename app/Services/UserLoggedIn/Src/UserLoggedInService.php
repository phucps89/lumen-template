<?php

namespace App\Services\UserLoggedIn\Src;

use App\Entities\User\User;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\JWT;

/**
 * Created by PhpStorm.
 * Account: phuctran
 * Date: 09/02/2017
 * Time: 10:03
 */
class UserLoggedInService
{
    protected $_user;

    public function __construct()
    {
        $jwt = $this->getJWT();

        $user = $jwt->authenticate();
        $this->_user = $this->unserialize($user);
    }

    private function getJWT() : JWT{
        return JWTAuth::parseToken();
    }

    private function unserialize($object) : User {
        return $object;
    }

    public function getUser() : User{
        return $this->_user;
    }
}