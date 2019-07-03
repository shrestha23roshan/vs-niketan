<?php

namespace Modules\MediaManagement\Entities;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use App\Category;

class Video extends Model
{
    use Sluggable;

    protected $fillable = [
        'category_id',
        'heading',
        'slug',
        'description',
        'video_url',
        'video_embed_code',
        'video_thumbnail_image',
        'meta_title',
        'meta_tags',
        'meta_description',
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
                'source' => 'heading'
            ]
        ];
    }

     /**
     * Get category of video
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

}
