<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Post;
use App\Tag;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.post_show', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        return view('admin.post_add', ['type' => 'Add', 'tags' => $tags]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {

        $request->merge(["author_id" => Auth::User()->id]);
        $post = Post::create($request->all());

        $post->featured_image = $post->id.'.jpg';
        $post->save();
        $request->file('featured_image')->move(public_path("/images/post/"), $post->id.'.jpg');

        $post->tags()->attach($request->tags);
        return redirect()->route('post_show');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $tags = Tag::all();
        return view('admin.post_add', ['type' => 'Edit', 'post' => $post, 'tags' => $tags]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->merge(["author_id" => Auth::User()->id]);
        $post = Post::findOrFail($id);

        $post->update($request->all());
        $post->featured_image = $post->id.'.jpg';
        $post->save();

        $request->file('featured_image')->move(public_path("/images/post/"), $post->id.'.jpg');

        $post->tags()->sync($request->tags);
        //return view('test',['req'=>$request->tags]);
        return redirect()->route('post_show');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        
    }
}
