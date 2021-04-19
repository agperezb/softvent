<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            'user_profile' => 'administrator',
            'email' => 'admin@gmail.com',
            'commerce_id' => null,
            'password' => Hash::make('admin12345'),
            'user_status' => 1,
            'email_verified_at' => Date::now(),
        ]);


    }
}
