<?php
namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Services\UserLoggedIn\UserLoggedInFacade;

class UserController extends Controller
{
    function index(){
        return 'Account module - User Controller';
    }

    /**
     * @SWG\Get(
     *     tags={"Account"},
     *     path="/account/user/profile",
     *     summary="Get profile user logged in",
     *     @SWG\Parameter(ref="#/parameters/auth_header"),
     *     @SWG\Response(response="200", description="Get profile successfully")
     * )
     */
    function profile(){
        $user = UserLoggedInFacade::getUser();//$user->restoreSoftDelete();
        return \RS::send($user);
    }
}