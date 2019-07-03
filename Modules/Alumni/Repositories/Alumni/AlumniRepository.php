<?php
namespace Modules\Alumni\Repositories\Alumni;

interface AlumniRepository
{
    public function all();

    public function changeStatus($id);

}