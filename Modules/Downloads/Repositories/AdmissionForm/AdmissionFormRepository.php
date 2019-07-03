<?php
namespace Modules\Downloads\Repositories\AdmissionForm;

interface AdmissionFormRepository
{
    public function all();
    
    public function findByCategoryId($id);

    public function getActiveByCategoryId($id);
}