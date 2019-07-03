<?php
namespace Modules\BulletinBoardManagement\Repositories\News;

interface NewsRepository 
{
    public function all();
    
    public function findByCategoryId($id);

    public function findByCategoryIdAndPaginate($id, $paginate);

    public function findBySlug($slug);

    public function getAllByCategoryId($id);
}