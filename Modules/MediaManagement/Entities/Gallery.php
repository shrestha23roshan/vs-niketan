<?php

namespace Modules\MediaManagement\Entities;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use Cviebrock\EloquentSluggable\Sluggable;

class Gallery extends Model
{
    use Sluggable;
    
    protected $table = 'gallery';

    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'attachment',
        'is_active',
        'created_by',
        'updated_by'
    ];
    protected $hidden = ['created_at', 'updated_at'];

    /**
     * Return the sluggable configuration array for this model.
     * 
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    /**
     * Get category of gallery
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    
}
