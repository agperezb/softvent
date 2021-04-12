<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $primaryKey = 'product_id';

    protected $fillable = [
        'provider_id',
        'category_id',
        'commerce_id',
        'product_name',
        'product_stock',
        'product_value',
        'product_description',
        'product_status',
    ];
}
