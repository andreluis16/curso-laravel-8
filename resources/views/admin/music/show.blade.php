@extends('admin.layouts.app')

@section('title', 'Detalhes da Musica')

@section('content')
<div class="bg-secondary p-5 rounded-lg m-3">
<h1>Detalhes da Musica - {{ $music->name }}</h1>
</div>

<div class="container">
    <div class="row d-flex justify-content-center">
        <div>
            <div class="row m-4">
                <h1 class="col-xl-6">{{ $music->band }}</h1>
                <img src="{{ url("storage/{$music->album}") }}" class="img-size rounded col-xl-6" alt="album">
            </div>
            <div class="col-4 m-4">
                <h3>{{ $music->name }}</h3>
                <p>{{ $music->lyrics }}</p>
            </div>
        </div>
    </div>

    <div class="row d-flex justify-content-end">
        <a class="btn btn-secondary" href="{{ route('music.edit', $music->id ) }}">Editar Musica</a>

        <form action="{{ route('music.destroy', $music->id ) }}" method="POST">
            @csrf
            @method('delete')
            <button class="btn btn-danger">Deletar Musica</button>
        </form>
    </div>

</div>

@endsection
