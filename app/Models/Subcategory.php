<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Subcategory extends Model
{
    protected $guarded = ['id'];
    use Sluggable;

    public function sluggable(): array
    {
        return [
            'subcategory_slug' => [
                'source' => 'subcategory_name'
            ]
        ];
    }

    function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
