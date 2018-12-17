<?php

use Illuminate\Database\Seeder;

class BiodataTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('biodatas')->insert([[
            'phone' => '081000000000',
            'gender' => 'Laki-Laki',
            'website' => 'www.example.com',
            'date_of_birth' => date('Y-m-d'),
            'place_of_birth' => 'Surabaya',
            'user_id' => 1,
            'created_at' => new Datetime(),
            'updated_at' => new Datetime()
        ],
        [
            'phone' => '085111111111',
            'gender' => 'Perempuan',
            'website' => 'wwww.website.com',
            'date_of_birth' => date('Y-m-d'),
            'place_of_birth' => 'Surabaya',
            'user_id' => 2,
            'created_at' => new Datetime(),
            'updated_at' => new Datetime()
        ]]);
    }
}
