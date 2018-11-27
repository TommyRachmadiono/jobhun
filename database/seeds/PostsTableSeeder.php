<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	for($i = 0; $i < 10; $i++) {
    		DB::table('posts')->insert([
    			'title' => str_random(10),
    			'content' => str_random(10).'@gmail.com',
    			'featured_image' => bcrypt('secret'),
    			'author_id' => rand(0,10)
    		]);
    	}
    }
}
