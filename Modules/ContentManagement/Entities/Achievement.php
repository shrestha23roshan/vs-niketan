<?php

namespace Modules\ContentManagement\Entities;

use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    protected $fillable = [
        'certified_teacher',
        'graduated_student',
        'award_winner',
        'is_active',
        'created_by',
        'updated_by'
    ];

    protected $hidden = ['created_at','updated_at'];
}
