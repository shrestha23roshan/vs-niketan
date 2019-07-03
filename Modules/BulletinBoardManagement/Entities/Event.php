<?php

namespace Modules\BulletinBoardManagement\Entities;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use Cviebrock\EloquentSluggable\Sluggable;
use Carbon\Carbon;

class Event extends Model
{
    use Sluggable;
    
    protected $fillable = [
        'category_id',
        'heading',
        'venue',
        'description',
        'date',
        'slug',
        'is_active',
        'created_by',
        'updated_by'
    ];

    protected $hidden = ['created_at','updated_at'];

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
     * Get category of event
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function getDate()
    {
        return Carbon::createFromFormat('Y-m-d', $this->date)->format(' M d');
    }

}
