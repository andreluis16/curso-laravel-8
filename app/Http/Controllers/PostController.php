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

        return redirect()
                    ->route('posts.list')
                    ->with('message', 'Post criado com sucesso');

    }

    public function show($id){

        if(!$post = Post::find($id)){
            return redirect()->route('posts.list');
        }
        return view('admin.posts.show', compact('post'));
    }

    public function destroy($id){

        if(!$post = Post::find($id)){
            return redirect()->route('posts.list');
        }
        $post->delete();

        return redirect()
                    ->route('posts.list')
                    ->with('message', 'Post deletado com sucesso');
    }

    public function edit($id){

        if(!$post = Post::find($id)){
            return redirect()->route('posts.list');
        }

        return view('admin.posts.edit', compact('post'));

    }

    public function update(StoreUpdatePost $request, $id){

        if(!$post = Post::find($id)){
            return redirect()->route('posts.list');
        }

        $post->update($request->all());

        return redirect()
                    ->route('posts.list')
                    ->with('message', 'Post editado com sucesso');
    }
}
