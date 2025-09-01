<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Color extends Model
{
    use Sluggable;
    protected $guarded = ['id'];

    public function sluggable(): array
    {
        return [
            'color_slug' => [
                'source' => 'color_name'
            ]
        ];
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'colors_products', 'color_id', 'product_id')
            ->withTimestamps();
    }
}
