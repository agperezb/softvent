<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commerce extends Model
{
    use HasFactory;

    protected $primaryKey = 'commerce_id';

    protected $fillable = [
        'user_id',
        'commerce_name',
        'commerce_status',
    ];
}
