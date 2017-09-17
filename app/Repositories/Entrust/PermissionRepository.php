<?php
namespace App\Repositories\Entrust;

use App\Entities\Entrust\Permission;
use App\Repositories\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

class PermissionRepository extends BaseRepository
{

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Permission::class;
    }

    public function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub
        $this->pushCriteria(app(RequestCriteria::class));
    }
}