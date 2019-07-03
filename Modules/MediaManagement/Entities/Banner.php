<?php

namespace Modules\MediaManagement\Entities;

use Illuminate\Database\Eloquent\Model;
use App\Category;

class Banner extends Model
{
    protected $fillable = [
        'category_id',
        // 'title',
        'attachment',
        'is_active',
        'created_by',
        'updated_by'
    ];

    protected $hidden = ['created_at','updated_at'];

    
     /**
     * Get category of banner
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
