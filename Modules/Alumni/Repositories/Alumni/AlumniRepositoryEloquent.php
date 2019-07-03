<?php
namespace Modules\Alumni\Repositories\Alumni;

use App\Repositories\BaseRepositoryEloquent;
use Modules\Alumni\Entities\Alumni;
use DB;

class AlumniRepositoryEloquent extends BaseRepositoryEloquent implements AlumniRepository
{
    protected $model;

    public function __construct(Alumni $model)
    {
        $this->model = $model;
    }

    /**
     * Get alumni based on category id
     * Created at: Sunday, March 17, 2019 
     * Updated at: Sunday, March 17, 2019 
     * @author Roshan Shrestha
     * 
     * @param int $id
     * @return Collection
     */
    public function findByCategoryId($id)
    {
        return $this->model->where('category_id', $id)->get();
    }

    /**
     * Get alumni based on category idand paginate
     * Created at: Sunday, March 17, 2019 
     * Updated at: Sunday, March 17, 2019
     * @author Tulsi Thapa
     * 
     * @param int $id
     * @return Collection
     */
    public function getActiveAndPaginate($paginate)
    {
        return $this->model->where('is_active', '=', '1')->orderBy('created_at', 'desc')->paginate($paginate);
    }

    public function changeStatus($id)
    {
        DB::beginTransaction();
        try{
            $alumni = $this->model->findOrFail($id);
            $alumni->is_active == '0' ? $alumni->fill(['is_active' => '1'])->save() : $alumni->fill(['is_active' => '0'])->save();
            DB::commit();
            return $alumni;
        } catch (\Exception $e) {
            DB::rollback();
            return false;
        }
    }
}