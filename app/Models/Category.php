<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    protected $guarded = [];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
