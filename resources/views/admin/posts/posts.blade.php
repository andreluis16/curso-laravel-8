@extends('admin.layouts.app')

@section('title', 'Listar Posts')

@section('content')
<div class="bg-secondary p-5 rounded-lg m-3">
    <h1>POSTS</h1>
</div>


@if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif

<div class="row m-1">

    <div class="col-xl-9">
        <a class="btn btn-success" href="{{ route('posts.create-form') }}">Adicionar Novo Post</a>
    </div>
    <div class="col-xl-3">
        <form class="form-inline"  action="{{ route('posts.search') }}" method="POST">
            @csrf
            <input class="form-control" type="text" name="search" placeholder="Filtrar" >
            <button type="submit" class="btn btn-primary">Filtrar</button>
        </form>
    </div>

</div>

<table class="table table-bordered">
    <thead class="thead-light">
        <th>Id</th>
        <th>Title</th>
        <th>Imagem</th>
        <th>Ver</th>
    </thead>
    @foreach ($posts as $post)
    <tbody>
        <td>{{ $post->id}}</td>
        <td>{{ $post->title }}</td>
        <td><img src="{{ url("storage/{$post->image}") }}" class="img-small rounded" alt="post-image"></td>
        <td>
            <a class="btn btn-info" href="{{ route('posts.show', $post->id) }}">Ver</a>
        </td>
    </tbody>
    @endforeach
</table>

<hr>
<div class="d-flex justify-content-center">
@if (isset($filters))
    {{ $posts->appends($filters)->links() }}
@else
    {{ $posts->links() }}
@endif
</div>



@endsection
