<?php
namespace Modules\MediaManagement\Repositories\Gallery;

interface GalleryRepository
{
    public function all();

    public function findByCategoryId($id);

    public function findByCategoryIdAndPaginate($id, $paginate);

    public function findBySlug($slug);
}