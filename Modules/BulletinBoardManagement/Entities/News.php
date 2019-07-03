<?php

namespace Modules\BulletinBoardManagement\Entities;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use App\Category;
use Carbon\Carbon;

class News extends Model
{
    use Sluggable;

    protected $fillable = [
        'category_id',
        'heading',
        'date',
        'slug',
        'description',
        'attachment',
        'author',
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
     * Get category of news
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function getDate()
    {
        return Carbon::createFromFormat('Y-m-d', $this->date)->format('d M Y');
    }
    
}
