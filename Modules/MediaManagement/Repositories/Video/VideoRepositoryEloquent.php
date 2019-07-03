<?php
namespace Modules\MediaManagement\Repositories\Video;

use App\Repositories\BaseRepositoryEloquent;
use Modules\MediaManagement\Entities\Video;

class VideoRepositoryEloquent extends BaseRepositoryEloquent implements VideoRepository
{
    protected $model;

    public function __construct(Video $model)
    {
        $this->model = $model;
    }

     /**
     * Get video based on category id
     * Created at:
     * Updated at:
     * @author Roshan shrestha
     * 
     * @param int @id
     * @return Collection
     */
    public function findByCategoryId($id)
    {
        return $this->model->where('category_id', $id)->orderBy('created_at', 'desc')->get();
    }

    /**
     * Get Latestest active video based on category id
     * Created at: Thrusday, March 14, 2019
     * Updated at: Thrusday, March 14, 2019
     * @author Tulsi Thapa
     * 
     * @param int @id
     * @return Collection
     */
    public function findByCategoryIdAndPaginate($id, $paginate)
    {
        return $this->model->where('is_active', '=', '1')->where('category_id', $id)->orderBy('created_at', 'desc')->paginate($paginate);
    }

    /**
     * Find video based on slug field.
     * Created at: Thrusday, March 14, 2019
     * Updated at: Thrusday, March 14, 2019
     * @author Tulsi Thapa
     * 
     * @param string $slug
     * @return Video
     */
    public function findBySlug($slug)
    {
        return $this->model->where('slug', $slug)->first();
    }

}