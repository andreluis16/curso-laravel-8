@extends('admin.layouts.app')

@section('titke', 'Editar Post')

@section('content')

<div class="bg-secondary p-5 rounded-lg m-3">
    <h1>Editar Post - {{ $post->title }}</h1>
</div>

<form method="POST" action="{{ route('posts.update', $post->id) }}" enctype="multipart/form-data">
    @method('put')
    @include('admin.posts._partials.form');
</form>

@endsection
