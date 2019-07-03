<?php
namespace Modules\Downloads\Repositories\Result;

interface ResultRepository
{
    public function all();

    public function findByCategoryId($id);

    public function getActiveByCategoryId($id);
}