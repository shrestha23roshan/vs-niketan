<?php
namespace Modules\Downloads\Repositories\Result;

use App\Repositories\BaseRepositoryEloquent;
use Modules\Downloads\Entities\Result;

class ResultRepositoryEloquent extends BaseRepositoryEloquent implements ResultRepository
{
    protected $model;

    public function __construct(Result $model)
    {
        $this->model = $model;
    }

    /**
     * Get result based on category id
     * Get results with descending order.
     * Created at:
     * Updated at:
     * @author Roshan Shrestha
     * 
     * @param int @id
     * @return Collection
     */
    public function findByCategoryId($id)
    {
        return $this->model->where('category_id', $id)
                ->orderBy('created_at', 'desc')->get();
    }

    /**
     * Get active results based on category id
     * Created at: Wednesday, March 13, 2019
     * Updated at: Wednesday, March 13, 2019
     * @author Tulsi Thapa
     * 
     * @param int @id
     * @return Collection
     */
    public function getActiveByCategoryId($id)
    {
        return $this->model->where('is_active', '=', '1')
                            ->where('category_id', $id)
                            ->orderBy('created_at', 'desc')->get();
    }

}