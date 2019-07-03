<?php
namespace Modules\BulletinBoardManagement\Repositories\News;

use App\Repositories\BaseRepositoryEloquent;
use Modules\BulletinBoardManagement\Entities\News;

class NewsRepositoryEloquent extends BaseRepositoryEloquent implements NewsRepository
{
    protected $model;

    public function __construct(News $model)
    {
        $this->model = $model;
    }

    /**
     * Get news based on category id
     * Created at: Monday, March 11, 2019
     * Updated at: Monday, March 11, 2019
     * @author Roshan Shrestha
     * 
     * @param int $id
     * @return Collection
     */
    public function findByCategoryId($id)
    {
        return $this->model->where('is_active', '=', '1')->where('category_id', $id)->orderBy('created_at', 'desc')->get();
    }

    /**
     * Get Latestest active news based on category id
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
     * Created at: Friday, March 15, 2019
     * Updated at: Friday, March 15, 2019
     * @author Tulsi Thapa
     * 
     * @param string $slug
     * @return Video
     */
    public function findBySlug($slug)
    {
        return $this->model->where('slug', $slug)->first();
    }

    /**
     * Get all news based on category id.
     * Invoked: NewsController
     * Created at: Thursday, April 18, 2019
     * Updated at: Thursday, April 18, 2019
     * @author Siddhant Thapa
     * 
     * @param int $id
     * @return Collection
     */
    public function getAllByCategoryId($id)
    {
        return $this->model->where('category_id', $id)->orderBy('created_at', 'desc')->get();
    }

}