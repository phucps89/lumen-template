<?php

namespace App\Services\UserLoggedIn\Src;

use App\Entities\User\User;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\JWT;
use Tymon\JWTAuth\Token;

/**
 * Created by PhpStorm.
 * Account: phuctran
 * Date: 09/02/2017
 * Time: 10:03
 */
class UserLoggedInService
{
    protected $_user;
    protected $_jwt;

    public function __construct()
    {
        $this->_jwt = $this->getJWT();

        $user = $this->_jwt->authenticate();
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

    public function getToken(): Token{
        return $this->_jwt->getToken();
    }
}