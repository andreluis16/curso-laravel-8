<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function list(){

        $posts = Post::get();
        return view('admin.posts.posts', compact('posts'));
    }

    public function createForm(){
        return view('admin.posts.create');
    }

    public  function create(Request $request){

        Post::create($request->all());

        return redirect()->route('posts.list');

    }
}
