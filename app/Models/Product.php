<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $primaryKey = 'product_id';

    protected $fillable = [
        'provider_id',
        'category_id',
        'commerce_id',
        'product_name',
        'product_stock',
        'product_image',
        'product_value',
        'product_description',
        'product_status',
    ];

    public function categories()
    {
        return $this->hasOne(Category::class, 'category_id', 'category_id');
    }

    public function providers()
    {
        return $this->hasOne(Provider::class, 'provider_id', 'provider_id');
    }
}
