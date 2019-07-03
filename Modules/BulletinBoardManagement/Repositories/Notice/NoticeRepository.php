<?php
namespace Modules\BulletinBoardManagement\Repositories\Notice;

interface NoticeRepository
{
    public function all();

    public function findByCategoryId($id);

    public function getAllByCategoryId($id);
}