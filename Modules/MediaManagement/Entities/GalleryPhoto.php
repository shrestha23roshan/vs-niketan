<?php

namespace Modules\MediaManagement\Entities;

use Illuminate\Database\Eloquent\Model;

class GalleryPhoto extends Model
{
    protected $fillable = [
        'gallery_id',
        'attachment',
        'created_by',
        'updated_by'
    ];

    protected $hidden = ['created_at','updated_at'];

    public function gallery()
    {
        return $this->belongsTo(Gallery::class, 'gallery_id');
    }
}
