<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([[
         'name' => 'Denies Kresna',
         'email' => 'batkorumbawa@gmail.com',
         'password' => bcrypt('12345'),
         'username' => "denieskresna",
         'role' => 'administrator',
         'photo' => "1.jpg",
         'created_at' => new Datetime(),
         'updated_at' => new Datetime()
     ],
     [
        'name' => 'Cynthia Cecilia',
        'email' => 'cynthcecilia@gmail.com',
        'password' => bcrypt('12345'),
        'username' => "cynthiacecilia",
        'role' => 'author',
        'photo' => "2.jpg",
        'created_at' => new Datetime(),
        'udpated_at' => new Datetime()
    ]]);
  }
}

