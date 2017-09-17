<?php

namespace App\Http\Controllers;

use App\Libraries\Helper;
use App\Libraries\MailObject;
use App\Mails\ExampleMail;
use Illuminate\Http\File;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;
use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    //
    function home(){
        return App::version();
    }
}
