<?php

namespace App\Models;

use App\Enums\ProductStatusEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    protected $guarded = [];

    protected function casts()
    {
        return [
            'status' => ProductStatusEnum::class,
        ];
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function vendor()
    {
        return $this->belongsTo(Vendor::class, 'vendor_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
