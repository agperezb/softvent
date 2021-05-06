<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commerce extends Model
{
    use HasFactory;

    protected $primaryKey = 'commerce_id';

    protected $fillable = [
        'commerce_name',
        'commerce_description',
        'commerce_status',
    ];
}
