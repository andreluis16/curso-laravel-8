<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateMusic;
use App\Models\Music;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class MusicController extends Controller{

    public function list(){

        $musics = Music::latest()->paginate(1);

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

}
