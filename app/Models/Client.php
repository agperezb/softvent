<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $primaryKey = 'client_id';

    protected $fillable = [
        'document_type_id',
        'client_name',
        'client_document',
        'client_phone',
        'client_points',
    ];
}
