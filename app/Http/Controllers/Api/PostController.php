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
       $posts = Post::with(['category', 'tags'])->paginate(2); //impaginazione e Laravel unisce anche la relatione con Category
       
       return response()-> json(
           [
            'results' => $posts,
            'success' => true
           ]
        );
    }

    public function show($slug){

        $post = Post::where('slug', '=', $slug)->with( ['category', 'tags'])->first();
        if ($post){
            return response()-> json(
                [
                    'result' => $post,
                    'success' => true
                ],
            );
        }else{
            return response()->json(
                [
                    'result' => 'Nessun risultato trovato',
                    'success' => false
                ]
            );
        }
    }
}
