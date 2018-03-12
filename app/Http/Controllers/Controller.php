<?php

namespace App\Http\Controllers;

use App\Repositories\User\UserRepository;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;
use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    //
    function home(UserRepository $repository){
        return \app()->version();
    }
}
