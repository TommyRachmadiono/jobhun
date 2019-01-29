<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Tag;
use DB;

class BlogController extends Controller
{
    public function index($tag="")
    {
        if ($tag == "")
            $posts = Post::with('tags')->get();
        else {
            //dapet post sesuai where
            $posts =  DB::table('posts')->join("post_tag","post_tag.post_id","=","posts.id")
                ->join("tags","post_tag.tag_id","=","tags.id")->where("tags.tag", '=', "hewan")->get();
            
            //masukin tag
            
            foreach ( $posts as $post) {
                $tags = DB::table('tags as t')->join('post_tag as pt','t.id','=','pt.tag_id')
                    ->where('pt.post_id','=',$post->post_id)->get();
                $post->tags = $tags;
            }
        }

        //return response()->json(["p"=>$posts]);
        return view('user.blog_all', ['posts' => $posts]);
    }

    public function detailBlog($url)
    {
        $post = Post::where('url', '=', $url)->firstOrFail();
        return view('user.blog_detail', ['post' => $post]);
    }

    // public function test()
    // {
    //     $tags = Post::with
    //     return response()->json();
    // }
}
