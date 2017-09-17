<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\ModelNotFoundException;

/**
 * Created by PhpStorm.
 * Account: phuctran
 * Date: 25/01/2017
 * Time: 11:23
 */
abstract class BaseRepository extends \Prettus\Repository\Eloquent\BaseRepository
{
    public function find($id, $columns = ['*'])
    {
        try {
            return parent::find($id, $columns); // TODO: Change the autogenerated stub
        } catch (ModelNotFoundException $e) {
            return null;
        }
    }
}