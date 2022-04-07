<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\support\Str;

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
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'title' =>'required|min:5',
                'content' => 'required|min:10'
            ]
        );

        $data =  $request->all();

        $slug = Str::slug($data['title']);

        $counter = 1;
        while(Post::where('slug', $slug)->first()){
            $slug = Str::slug($data['title']). '-' . $counter;
            $counter++;
        }

        $data['slug'] = $slug;

        $post = new Post();

        $post->fill($data);
        $post->save();
        
        return redirect()->route('admin.posts.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view ('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate(
            [
                'title' =>'required|min:5',
                'content' => 'rerquired|min:10'
            ]
        );

        $data =  $request->all();

        $slug = Str::slug($data['title']);

        if($post->slug != $slug){

            $counter = 1;
            while(Post::where('slug', $slug)->first()){
                $slug = Str::slug($data['title']). '-' . $counter;
                $counter++;
            }
            $data['slug'] = $slug;

        }
        
        $post->update($data);
        $post->save();
        
        return redirect()->route('admin.posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index');
    }
}
