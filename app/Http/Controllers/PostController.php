<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdatePost;
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

    public  function create(StoreUpdatePost $request){

        Post::create($request->all());

        return redirect()->route('posts.list');

    }

    public function show($id){

        $post = Post::where('id', $id)->first();
        $post = Post::find($id);

        dd($post);

    }
}
