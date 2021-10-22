@if ($errors->any())

    <div>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </div>

@endif

@csrf

<label for="">Imagem</label>
<input type="file" name="image" id="image">

<label for="">Titulo</label>
<input type="text" name="title" id="title" placeholder="titulo" value="{{ $post->title ?? old('title') }}">

<label for="">Conteudo</label>
<textarea name="content" id="content" cols="30" rows="4" placeholder="conteudo">{{ $post->content ?? old('content') }}</textarea>

<button type="submit">Criar</button>
