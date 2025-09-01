<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Size extends Model
{
    use Sluggable;
    protected $guarded = ['id'];

    public function sluggable(): array
    {
        return [
            'size_slug' => [
                'source' => 'size_name'
            ]
        ];
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'sizes_products', 'size_id', 'product_id')
            ->withTimestamps();
    }
}
