<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'id';

    protected $fillable = [
        'user_profile',
        'user_status',
        'email',
        'password',
        'commerce_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function person()
    {
        return $this->hasOne(Person::class, 'user_id', 'id');
    }

    public function commerce()
    {
        return $this->belongsTo(Commerce::class, 'commerce_id', 'commerce_id');
    }
}
