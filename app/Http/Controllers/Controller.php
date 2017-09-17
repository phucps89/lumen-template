<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    //
    function home(){
        return App::version();
    }
}
