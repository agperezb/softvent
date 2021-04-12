<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{
    use HasFactory;

    protected $primaryKey = 'configuration_id';

    protected $fillable = [
        'configuration_name',
        'configuration_value',
    ];
}
