@extends('admin.layouts.app')

@section('title', 'Adicionar Musica')

@section('content')

<div class="bg-secondary p-5 rounded-lg m-3">
    <h1>Adicionar Musica</h1>
</div>

<form method="POST" action="{{ route('music.create-save') }}" enctype="multipart/form-data">
    @include('admin.music._partials.form');
</form>

@endsection
