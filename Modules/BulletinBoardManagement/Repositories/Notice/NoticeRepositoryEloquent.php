<?php
namespace Modules\BulletinBoardManagement\Repositories\Notice;

use App\Repositories\BaseRepositoryEloquent;
use Modules\BulletinBoardManagement\Entities\Notice;

class NoticeRepositoryEloquent extends BaseRepositoryEloquent implements NoticeRepository
{
    protected $model;

    public function __construct(Notice $model)
    {
        $this->model = $model;
    }

    /**
     * Get notices based on category id
     * Created at: Monday, March 11, 2019
     * Updated at: Monday, March 11, 2019
     * @author Roshan Shrestha
     * 
     * @param int $id
     * @return Collection
     */
    public function findByCategoryId($id)
    {
        return $this->model->where('is_active', '1')->where('category_id', $id)->orderBy('created_at', 'desc')->get();
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
     * Get all notice based on category id.
     * Invoked: NotceController
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