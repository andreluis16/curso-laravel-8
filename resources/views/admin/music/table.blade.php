@extends('admin.layouts.app')

@section('title', 'Tabela de Musicas')

@section('content')
<div class="bg-secondary p-5 rounded-lg m-3">
    <h1>Tabela de Musicas</h1>
</div>


@if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif

<div class="row m-1">

    <div class="col-xl-9">
        <a class="btn btn-success" href="{{ route('music.create-form') }}">Adicionar Novo Post</a>
    </div>
    <div class="col-xl-3">
        <form class="form-inline"  action="{{ route('music.search') }}" method="POST">
            @csrf
            <input class="form-control" type="text" name="search" placeholder="Filtrar" >
            <button type="submit" class="btn btn-primary">Filtrar</button>
        </form>
    </div>

</div>

<table class="table table-bordered">
    <thead class="thead-light">
        <th>Id</th>
        <th>Banda</th>
        <th>Musica</th>
        <th>Album</th>
        <th>Ver</th>
    </thead>
    @foreach ($musics as $music)
    <tbody>
        <td>{{ $music->id}}</td>
        <td>{{ $music->band }}</td>
        <td>{{ $music->name }}</td>
        <td><img src="{{ url("storage/{$music->album}") }}" class="img-small rounded" alt="music-image"></td>
        <td>
            <a class="btn btn-info" href="{{ route('music.show', $music->id) }}">Ver</a>
        </td>
    </tbody>
    @endforeach
</table>

<hr>
<div class="d-flex justify-content-center">
@if (isset($filters))
    {{ $musics->appends($filters)->links() }}
@else
    {{ $musics->links() }}
@endif
</div>

@endsection
