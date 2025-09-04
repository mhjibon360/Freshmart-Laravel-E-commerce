<?php

namespace App\Models;

use App\Models\Subcategory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Product extends Model
{
    use Sluggable;
    protected $guarded = ['id'];


    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'product_name'
            ]
        ];
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class, 'subcategory_id', 'id');
    }

    public function sizes()
    {
        return $this->belongsToMany(Size::class, 'sizes_products', 'product_id', 'size_id')
            ->withTimestamps();
    }

    public function colors()
    {
        return $this->belongsToMany(Color::class, 'colors_products', 'product_id', 'color_id')
            ->withTimestamps();
    }
}
