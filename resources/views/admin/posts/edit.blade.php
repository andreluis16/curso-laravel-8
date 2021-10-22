@extends('admin.layouts.app')

@section('titke', 'Editar Post')

@section('content')

<h1>Editar Post <strong>{{ $post->title }}</strong> </h1>

<form method="POST" action="{{ route('posts.update', $post->id) }}" enctype="multipart/form-data">
    @method('put')
    @include('admin.posts._partials.form');
</form>

@endsection
