<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    protected $primaryKey = 'person_id';

    protected $fillable = [
        'user_id',
        'document_type_id',
        'person_name',
        'person_last_name',
        'person_document',
        'person_phone',
        'person_birthdate',
    ];
}
