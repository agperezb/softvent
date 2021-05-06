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
        DB::table('commerces')->insert([
            'commerce_id' => 1,
            'commerce_name' => 'admin',
            'commerce_description' => 'admin',
            'commerce_status' => 1,
        ]);
        DB::table('users')->insert([
            'user_profile' => 'administrator',
            'email' => 'admin@gmail.com',
            'commerce_id' => 1,
            'password' => Hash::make('admin12345'),
            'user_status' => 1,
            'email_verified_at' => Date::now(),
        ]);

        DB::table('document_types')->insert([
            'document_type_name' => 'CC',
        ]);
        DB::table('commerces')->insert([
            'commerce_id' => 2,
            'commerce_name' => 'Tienda DRA',
            'commerce_description' => 'Tienda distribuidora de ropa amanecer',
            'commerce_status' => 1,
        ]);
        DB::table('users')->insert([
            'id' => 2,
            'user_profile' => 'commerce',
            'email' => 'commerce@gmail.com',
            'commerce_id' => 2,
            'password' => Hash::make('commerce'),
            'user_status' => 1,
            'email_verified_at' => Date::now(),
        ]);
        DB::table('persons')->insert([
            'user_id' => 2,
            'document_type_id' => 1,
            'person_name' => 'Angel',
            'person_last_name' => 'Perez',
            'person_document' => '1003145324',
            'person_phone' => '3124534321',
            'person_birthdate' => now(),
        ]);

        DB::table('providers')->insert([
            'provider_name' => 'Autoservicios la provincia',
            'provider_nit' => '1003452321',
            'provider_direction' => 'Barrio Centro N° 34-32',
            'provider_phone' => '314356324',
            'provider_status' => 1
        ]);


        DB::table('categories')->insert([
            'category_name' => 'Ropa',
            'category_image' => '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',
            'category_active' => 1,
        ]);
    }
}
