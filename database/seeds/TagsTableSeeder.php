<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('tags')->insert([[
         'tag' => 'Coba',
         'created_at' => new Datetime(),
         'updated_at' => new Datetime()
     ],
     [
        'tag' => 'Hewan',
        'created_at' => new Datetime(),
        'udpated_at' => new Datetime()
    ]]);
    }
}
