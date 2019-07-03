<?php
namespace Modules\BulletinBoardManagement\Repositories\Event;

use App\Repositories\BaseRepositoryEloquent;
use Modules\BulletinBoardManagement\Entities\Event;

class EventRepositoryEloquent extends BaseRepositoryEloquent implements EventRepository
{
    protected $model;

    public function __construct(Event $model)
    {
        $this->model = $model;
    }

    /**
     * Get events based on category id
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
     * Get Latestest active event based on category id
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
     * Get all events based on category id.
     * Invoked: EventController
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