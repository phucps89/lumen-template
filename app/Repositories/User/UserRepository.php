<?php

namespace App\Repositories\User;

use App\Entities\User\UserDept;
use App\Entities\User\UserRole;
use App\Jobs\SendReminderEmailJob;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Support\Facades\Hash;
use Prettus\Repository\Criteria\RequestCriteria;

/**
 * Created by PhpStorm.
 * Account: phuctran
 * Date: 19/01/2017
 * Time: 13:18
 */
class UserRepository extends BaseRepository
{

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        // TODO: Implement model() method.
        return \App\Entities\User\User::class;
    }

    public function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub
        $this->pushCriteria(app(RequestCriteria::class));
    }
}