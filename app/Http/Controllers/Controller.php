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
//        return \RS::send($repository->paginate());
        $e = new \Exception('chan wa di');
        try{
            1/0;
        }catch (\Exception $e){
//            print_r($e->getTrace());exit;
            return \RS::send($e, Response::HTTP_BAD_REQUEST);
        }

    }
}
