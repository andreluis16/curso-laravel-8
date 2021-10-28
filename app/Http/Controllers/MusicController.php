<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateMusic;
use App\Models\Music;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class MusicController extends Controller{

    public function list(){

        $musics = Music::latest()->paginate(4);

        return view('admin.music.table', compact('musics'));

    }

    public function createForm(){
        return view('admin.music.create');
    }

    public function create(StoreUpdateMusic $request){

        $data = $request->all();

        if($request->album->isValid()){

            $nameFile = Str::of($request->band)->slug('-').'.'.$request->album->getClientOriginalExtension();

            $album = $request->album->storeAs('albuns', $nameFile);
            $data['album'] = $album;
        }

        Music::create($data);

        return redirect()->route('music.list')->with('message', 'Musica Adicionada Com Sucesso');

    }

    public function search(Request $request){

        $filters = $request->except('_token');

        $musics = Music::where('band', 'LIKE', "%{$request->search}%")
                        ->orWhere('name', 'LIKE', "%{$request->search}%")
                        ->orWhere('lyrics', 'LIKE', "%{$request->search}%")
                        ->paginate(4);

        return view('admin.music.table', compact('filters', 'musics'));

    }

    public function show($id){

        if(!$music = Music::find($id)){
            return redirect()->route('music.list');
        }
        return view('admin.music.show', compact('music'));
    }

    public function edit($id){

        if(!$music = Music::find($id)){
            return redirect()->route('music.list');
        }
        return view('admin.music.edit', compact('music'));
    }

    public function update(StoreUpdateMusic $request, $id){

        if(!$music = Music::find($id)){
            return redirect()->route('music.list');
        }

        $data = $request->all();

        if($request->album && $request->album->isValid()){
            if(Storage::exists($music->album)){
                Storage::delete($music->album);
            }

            $nameFile = Str::of($request->band)->slug('-').'.'.$request->album->getClientOriginalExtension();
            $album = $request->album->storeAs('albuns', $nameFile);
            $data['album'] = $album;
        }

        $music->update($data);
        return redirect()->route('music.list')->with('message', 'Musica Editada Com Sucesso');
    }

    public function destroy($id){

        if(!$music = Music::find($id)){
            return redirect()->route('music.list');
        }

        if(Storage::exists($music->album)){
            Storage::delete($music->album);
        }

        $music->delete();

        return redirect()->route('music.list')->with('message', 'Musica Deletada Com Sucesso');

    }

}
