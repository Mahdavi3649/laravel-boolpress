<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with(['tags','category','user'])->orderByDesc('id')->paginate(9);
         return $posts;
    }

    public function show($slug)
    {

        $post = Post::with(['tags','category','user'])->where('slug', $slug)->first();
        if ($post){
            return $post;

        }else {
            //ddd($post);
            return response()->json([
                'status_code' => 404,
                'status_text' => 'not found',
            ]);
        }
    }
}
