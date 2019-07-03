<?php
namespace Modules\Testimonial\Repositories\Testimonial;

use App\Repositories\BaseRepositoryEloquent;
use Modules\Testimonial\Entities\Testimonial;

class TestimonialRepositoryEloquent extends BaseRepositoryEloquent implements TestimonialRepository
{
    protected $model;

    public function __construct(Testimonial $model)
    {
        $this->model = $model;
    }

    /**
     * Get testimonial based on category id
     * Created at: Monday, March 11, 2019
     * Updated at: Monday, March 11, 2019
     * @author Roshan Shrestha
     * 
     * @param int $id
     * @return Collection
     */
    public function findByCategoryId($id)
    {
        return $this->model->where('category_id', $id)->orderBy('created_at', 'desc')->get();
    }

    /**
     * Get all testimonial based on category id.
     * Invoked: TestimonialController
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