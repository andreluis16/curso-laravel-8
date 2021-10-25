@if ($errors->any())

    <div>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </div>

@endif

@csrf
<div class="container">
    <div class="form-group">
        <label>Imagem</label>
        <input type="file" name="image" class="form-control-file">
    </div>

    <div class="form-group">
        <label for="">Titulo</label>
        <input type="text" name="title" class="form-control" id="title" placeholder="titulo" value="{{ $post->title ?? old('title') }}">
    </div>

    <div class="form-group">
        <label for="">Conteudo</label>
        <textarea name="content" class="form-control" placeholder="conteudo">{{ $post->content ?? old('content') }}</textarea>
    </div>

    <button type="submit">Enviar</button>
</div>


