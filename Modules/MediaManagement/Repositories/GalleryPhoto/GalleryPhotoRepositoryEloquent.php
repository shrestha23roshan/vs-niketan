<?php
namespace Modules\MedaiManagement\Repositories\GalleryPhoto;

use App\Repositories\BaseRepositoryEloquent;
use Modules\MediaManagement\Entities\GalleryPhoto;

class GalleryPhotoRepositoryEloquent extends BaseRepositoryEloquent implements GalleryPhotoRepository
{
    protected $model;

    public function __construct(GalleryPhoto $model)
    {
        $this->model = $model;
    }

    /**
     * Find photos based on gallery id and return
     * Created at: Thursday, March 14, 2019
     * Updated at: Thursday, March 14, 2019
     * 
     * @param int $id
     * @return Collection
     */
    public function findByGalleryId($id)
    {
        return $this->model->where('gallery_id', '=', $id)->get();
    }
}