<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailInvoice extends Model
{
    use HasFactory;

    protected $primaryKey = 'detail_invoice_id';

    protected $fillable = [
        'product_id',
        'invoice_id',
        'product_value',
    ];
}
