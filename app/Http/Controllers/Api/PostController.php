<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Post;
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
       $posts = Post::with(['category'])->get();//Laravel unisce anche la relatione con Category
       $posts = Post::paginate(2);//impaginazione
       
       return response()->json(
           [
            'results' => $posts,
            'success' => true
           ]
        );
    }
}
