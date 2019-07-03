<?php
namespace Modules\MediaManagement\Repositories\Banner;

use App\Repositories\BaseRepositoryEloquent;
use Modules\MediaManagement\Entities\Banner;

class BannerRepositoryEloquent extends BaseRepositoryEloquent implements BannerRepository
{
    protected $model;

    public function __construct(Banner $model)
    {
        $this->model = $model;
    }

    /**
     * Get banners based on category id
     * Created at: Monday, March 11, 2019
     * Updated at: Monday, March 11, 2019
     * @author Siddhant Thapa
     * 
     * @param int $id
     * @return Collection
     */
    public function findByCategoryId($id)
    {
        return $this->model->where('category_id', $id)->orderBy('created_at', 'desc')->get();
    }
}