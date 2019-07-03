<?php

namespace Modules\Downloads\Entities;

use Illuminate\Database\Eloquent\Model;
use App\Category;

class Result extends Model
{
    protected $fillable = [
        'category_id',
        'download_attachment',
        'download_caption',
        'is_active',
        'meta_title',
        'meta_tags',
        'meta_description',
        'created_by',
        'updated_by'
    ];

    protected $hidden = ['created_at','updated_at'];

     /**
     * Get category of result
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
