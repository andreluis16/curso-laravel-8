@extends('admin.layouts.app')

@section('title', 'Criar Novo Post')

@section('content')
<div class="bg-secondary p-5 rounded-lg m-3">
    <h1>Cadastrar Novo Post</h1>
</div>

<form method="POST" action="{{ route('posts.create-save') }}" enctype="multipart/form-data">
    @include('admin.posts._partials.form');
</form>

@endsection
