<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    use HasFactory;

    protected $primaryKey = 'provider_id';

    protected $fillable = [
        'provider_name',
        'provider_nit',
        'provider_direction',
        'provider_phone',
        'provider_status'
    ];
}
