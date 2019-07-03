<?php
namespace Modules\MedaiManagement\Repositories\GalleryPhoto;

interface GalleryPhotoRepository
{
    public function all();

    public function findByGalleryId($id);

}