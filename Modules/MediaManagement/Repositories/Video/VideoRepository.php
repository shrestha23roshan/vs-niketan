<?php
namespace Modules\MediaManagement\Repositories\Video;

interface VideoRepository
{
    public function all();

    public function findByCategoryIdAndPaginate($id, $paginate);
}