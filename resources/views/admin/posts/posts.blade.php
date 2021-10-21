@extends('admin.layouts.app')

@section('title', 'Listar Posts');

@section('content')
<h1>POSTS</h1>

@if (session('message'))
    <div>
        {{ session('message') }}
    </div>
@endif

<form action="{{ route('posts.search') }}" method="POST">
    @csrf
    <input type="text" name="search" placeholder="Filtrar" >
    <button type="submit">Filtrar</button>

</form>

<a href="{{ route('posts.create-form') }}">Adicionar Novo Post</a>
@foreach ($posts as $post)

<P>{{ $post->title }}</P>
<a href="{{ route('posts.show', $post->id) }}">Ver</a>

@endforeach
<hr>

@if (isset($filters))
    {{ $posts->appends($filters)->links() }}
@else
    {{ $posts->links() }}
@endif


@endsection
