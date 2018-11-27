<?php

use Illuminate\Database\Seeder;

class LikesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	for($i = 0; $i < 10; $i++) {
    		DB::table('likes')->insert([
    			'user_id' => rand(0,10),
    			'post_id' => rand(0,10)
    		]);
    	}
    }
}
