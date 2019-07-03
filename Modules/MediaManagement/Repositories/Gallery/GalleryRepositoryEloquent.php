<?php
namespace Modules\MediaManagement\Repositories\Gallery;

use App\Repositories\BaseRepositoryEloquent;
use Modules\MediaManagement\Entities\Gallery;

class GalleryRepositoryEloquent extends BaseRepositoryEloquent implements GalleryRepository
{
    protected $model;

    public function __construct(Gallery $model)
    {
        $this->model = $model;
    }

    /**
     * Get gallery based on category id
     * Created at: Wednesday, March 13, 2019
     * Updated at: Wednesday, March 13, 2019
     * @author Roshan shrestha
     * 
     * @param int $id
     * @return Collection
     */
    public function findByCategoryId($id)
    {
        return $this->model->where('category_id', $id)->get();
    }

    /**
     * Get gallery based on category id
     * Created at: Thrusday, March 14, 2019
     * Updated at: Thrusday, March 14, 2019
     * @author Tulsi Thapa
     * 
     * @param int $id
     * @return Collection
     */
    public function findByCategoryIdAndPaginate($id, $paginate)
    {
        return $this->model->where('is_active', '=', '1')->where('category_id', $id)->paginate($paginate);
    }

    /**
     * Find album based on slug
     * Created at: Thrusday, March 14, 2019
     * Updated at: Thrusday, March 14, 2019
     * @author Tulsi Thapa
     * 
     * @param int $slug
     */
    public function findByCategoryIdAndSlug($id, $slug)
    {
        return $this->model->where('id', $id)->where('slug', '=', $slug)->first();
    }

    /**
     * Find gallery based on slug field.
     * Created at: Thrusday, March 14, 2019
     * Updated at: Thrusday, March 14, 2019
     * @author Siddhant Thapa
     * 
     * @param string $slug
     * @return Gallery
     */
    public function findBySlug($slug)
    {
        return $this->model->where('slug', $slug)->first();
    }

}