<?php
namespace Modules\BulletinBoardManagement\Repositories\Event;

interface EventRepository
{
    public function all();

    public function findByCategoryId($id);

    public function findByCategoryIdAndPaginate($id, $paginate);

    public function getAllByCategoryId($id);
}