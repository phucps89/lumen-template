<?php
namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Services\UserLoggedIn\UserLoggedInFacade;

class UserController extends Controller
{
    function index(){
        return 'Account module - User Controller';
    }

    function profile(){
        return \RS::send(UserLoggedInFacade::getUser());
    }
}