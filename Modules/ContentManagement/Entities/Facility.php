<?php

namespace Modules\ContentManagement\Entities;

use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    protected $fillable = [
        'title',
        'description',
        'attachment',
        'is_active',
        'meta_title',
        'meta_tags',
        'meta_description',
        'created_by',
        'updated_by'
    ];

    protected $hidden = ['created_at','updated_at'];
}
