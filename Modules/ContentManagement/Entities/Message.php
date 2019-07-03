<?php

namespace Modules\ContentManagement\Entities;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'heading',
        'name',
        'designation',
        'description',
        'attachment',
        'is_active',
        'created_by',
        'updated_by'
    ];

    protected $hidden = ['created_at','updated_at'];
}
