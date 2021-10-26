@if ($errors->any())

    <div>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </div>

@endif


<div class="container">
    @csrf
    <div class="form-group">
        <label for="">Banda</label>
        <input type="text" name="band" class="form-control" id="title" placeholder="titulo" value="{{ $music->title ?? old('title') }}">
    </div>

    <div class="form-group">
        <label>Album</label>
        <input type="file" name="album" class="form-control-file">
    </div>

    <div class="form-group">
        <label for="">Nome da Musica</label>
        <input type="text" name="name" class="form-control" id="title" placeholder="titulo" value="{{ $music->title ?? old('title') }}">
    </div>

    <div class="form-group">
        <label for="">Letra da Musica</label>
        <textarea name="lyrics" class="form-control" placeholder="conteudo">{{ $music->content ?? old('content') }}</textarea>
    </div>

    <button type="submit">Enviar</button>
</div>


