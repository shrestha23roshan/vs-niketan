<?php
namespace Modules\ContentManagement\Repositories\Achievement;

use App\Repositories\BaseRepositoryEloquent;
use Modules\ContentManagement\Entities\Achievement;

class AchievementRepositoryEloquent extends BaseRepositoryEloquent implements AchievementRepository
{
    protected $model;

    public function __construct(Achievement $model)
    {
        $this->model = $model;
    }
}