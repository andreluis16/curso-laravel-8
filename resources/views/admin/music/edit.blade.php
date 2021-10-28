@extends('admin.layouts.app')

@section('titke', 'Editar Musica')

@section('content')

<div class="bg-secondary p-5 rounded-lg m-3">
    <h1>Editar Musica - {{ $music->name }}</h1>
</div>

<form method="POST" action="{{ route('music.update', $music->id) }}" enctype="multipart/form-data">
    @method('put')
    @include('admin.music._partials.form');
</form>

@endsection
