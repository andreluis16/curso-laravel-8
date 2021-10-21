@extends('admin.layouts.app')

@section('title', 'Criar Novo Post')

@section('content')

<h1>Cadastrar Novo Post</h1>

<form method="POST" action="{{ route('posts.create-save') }}">
    @include('admin.posts._partials.form');
</form>

@endsection
