<?php

namespace App\Models;

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
}
