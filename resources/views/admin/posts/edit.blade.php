@extends('admin.layouts.app')

@section('titke', 'Editar Post')

@section('content')

<h1>Editar Post <strong>{{ $post->title }}</strong> </h1>

<form method="POST" action="{{ route('posts.update', $post->id) }}">
    @method('put')
    @include('admin.posts._partials.form');
</form>

@endsection
