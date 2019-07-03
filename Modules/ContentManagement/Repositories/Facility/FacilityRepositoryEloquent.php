<?php
namespace Modules\ContentManagement\Repositories\Facility;

use App\Repositories\BaseRepositoryEloquent;
use Modules\ContentManagement\Entities\Facility;

class FacilityRepositoryEloquent extends BaseRepositoryEloquent implements FacilityRepository
{
    protected $model;

    public function __construct(Facility $model)
    {
        $this->model = $model;
    }
   
}