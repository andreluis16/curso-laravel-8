<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdatePost;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function list(){

        $posts = Post::latest()->paginate(4);
        return view('admin.posts.posts', compact('posts'));
    }

    public function createForm(){
        return view('admin.posts.create');
    }

    public  function create(StoreUpdatePost $request){

        $data = $request->all();

        if($request->image->isValid()){

            $nameFile = Str::of($request->title)->slug('-').'.'.$request->image->getClientOriginalExtension();

            $image = $request->image->storeAs('posts', $nameFile);
            $data['image'] = $image;
        }

        Post::create($data);

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

        if(Storage::exists($post->image)){
            Storage::delete($post->image);
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

        $data = $request->all();

        if($request->image && $request->image->isValid()){
            if(Storage::exists($post->image)){
                Storage::delete($post->image);
            }

            $nameFile = Str::of($request->title)->slug('-').'.'.$request->image->getClientOriginalExtension();

            $image = $request->image->storeAs('posts', $nameFile);
            $data['image'] = $image;
        }

        $post->update($data);

        return redirect()
                    ->route('posts.list')
                    ->with('message', 'Post editado com sucesso');
    }

    public function search(Request $request){

        $filters = $request->except('_token');

        $posts = Post::where('title', 'LIKE', "%{$request->search}%")
                        ->orWhere('content', 'LIKE', "%{$request->search}%")
                        ->paginate(4);

        return view('admin.posts.posts', compact('posts', 'filters'));

    }
}
