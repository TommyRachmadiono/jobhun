<?php

use Illuminate\Database\Seeder;

class PostTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	for($i = 0; $i < 10; $i++) {
    		DB::table('post_tag')->insert([
    			'post_id' => rand(0,10),
    			'tag_id' => rand(0,10)
    		]);
    	}
    }
}
