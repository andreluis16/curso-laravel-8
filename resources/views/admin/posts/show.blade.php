@extends('admin.layouts.app')

@section('title', 'Detalhes do Post')

@section('content')
<div class="bg-secondary p-5 rounded-lg m-3">
<h1>Detalhes do Post - {{ $post->title }}</h1>
</div>

<div class="container">
    <div class="row d-flex justify-content-center">
        <div>
            <h1><strong>TItulo: </strong>{{ $post->title }}</h1>
            <img src="{{ url("storage/{$post->image}") }}" class="img rounded" alt="post">
            <strong>Conteudo: </strong>{{ $post->content }}
        </div>
    </div>

    <div class="row d-flex justify-content-end">
        <a class="btn btn-secondary" href="{{ route('posts.edit', $post->id ) }}">Editar o Post {{ $post->title }}</a>

        <form action="{{ route('posts.destroy', $post->id ) }}" method="POST">
            @csrf
            @method('delete')
            <button class="btn btn-danger" >Deletar o Post {{ $post->title }}</button>
        </form>
    </div>

</div>



@endsection
