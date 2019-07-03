<?php
namespace Modules\ContentManagement\Repositories\AboutUs;

use App\Repositories\BaseRepositoryEloquent;
use Modules\ContentManagement\Entities\AboutUs;

class AboutUsRepositoryEloquent extends BaseRepositoryEloquent implements AboutUsRepository
{
    protected $model;

    public function __construct(AboutUs $model)
    {
        $this->model = $model;
    }
    
     /**
     * Get active about us by category id.
     * created at: Wednesday, March 12, 2019
     * updated at: Wednesday, March 12, 2019
     * @author Tulsi Thapa
     * 
     */
    // public function getActiveById($id)
    // {
    //     $this->model->where('is_active', '=', '1')->where('id', '=', $id);
    // }
}