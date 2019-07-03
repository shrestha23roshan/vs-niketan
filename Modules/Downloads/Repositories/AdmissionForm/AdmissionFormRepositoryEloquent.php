<?php
namespace Modules\Downloads\Repositories\AdmissionForm;

use App\Repositories\BaseRepositoryEloquent;
use Modules\Downloads\Entities\AdmissionForm;

class AdmissionFormRepositoryEloquent extends BaseRepositoryEloquent implements AdmissionFormRepository
{
    protected $model;

    public function __construct(AdmissionForm $model)
    {
        $this->model = $model;
    }

    /**
     * Get admissionform based on category id in descending order.
     * Created at:
     * Updated at: Thursday, April 18, 2019
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
     * Get active admissionform based on category id
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