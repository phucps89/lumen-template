<?php

namespace App\Http\Controllers;

use App\Libraries\Helper;
use App\Libraries\MailObject;
use App\Mails\ExampleMail;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;
use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    //
    function home(){
        $mailObj = new MailObject();
        $mailObj->setSubject("Example Email for Lumen");
        $mailObj->setFrom('phucdaica@gmail.com');
        $mailObj->setTo('phuc.thanh.tran@seldatinc.com');
        $mailObj->setView('mails.example');
        Mail::send(new ExampleMail($mailObj));

        return App::version();
    }
}
