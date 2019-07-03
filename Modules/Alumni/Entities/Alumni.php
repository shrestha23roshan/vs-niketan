<?php

namespace Modules\Alumni\Entities;

use Illuminate\Database\Eloquent\Model;
use App\Category;

class Alumni extends Model
{
    protected $table = 'alumni';
    
    protected $fillable = [
        'full_name',
		'batch',
		'email',
		'phone_no',
		'address',
        'occupation',
        'attachment',
		'is_active'
    ];

    protected $hidden = ['created_at','updated_at'];

}
