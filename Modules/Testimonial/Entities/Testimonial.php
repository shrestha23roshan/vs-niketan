<?php

namespace Modules\Testimonial\Entities;

use Illuminate\Database\Eloquent\Model;
use App\Category;

class Testimonial extends Model
{
    protected $fillable = [
        'category_id',
        'full_name',
        'designation',
        'description',
        'attachment',
        'is_active',
        'created_by',
        'updated_by'
    ];

    protected $hidden = ['created_at', 'updated_at'];

     /**
     * Get category of testimonial
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
