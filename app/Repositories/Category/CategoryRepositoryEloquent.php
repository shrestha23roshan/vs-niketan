<?php
namespace App\Repositories\Category;

use App\Repositories\BaseRepositoryEloquent;
use App\Category;


class CategoryRepositoryEloquent extends BaseRepositoryEloquent implements CategoryRepository
{
    protected $model;

    public function __construct(Category $model)
    {
        $this->model = $model;
    }

}