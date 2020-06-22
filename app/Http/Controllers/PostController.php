<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $posts = Post::orderBy('post_id', 'desc')->paginate(2);
        // return $posts;
        // return view('posts.index')->with('posts', $posts);



        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        return view('posts.index')->with('posts', $user->posts);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this->validate($request, [
           'title' => 'required',
           'body' => 'required'
       ]);
       
       $post =  new POST;
       $post->title = $request->input('title');
       $post->description = $request->input('body');
       $post->file_name = '';
       $post->user_id = auth()->user()->id;
       $post->save();
       return redirect('/post')->with('success', 'Post haas been Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($post_id)
    {
        $post = Post::find($post_id);
        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($post_id)
    {
        $post = Post::find($post_id);
        return view('posts.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $post_id)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);
        
        $post =  Post::find($post_id);
        $post->title = $request->input('title');
        $post->description = $request->input('body');
        $post->save();
        return redirect('/post')->with('success', 'Post haas been Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($post_id)
    {
        $post =  Post::find($post_id);
        $post->delete();
        return redirect('/post')->with('success', 'Post haas been Deleted!');
    }
}
