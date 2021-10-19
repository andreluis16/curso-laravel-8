<h1>Cadastrar Novo Post</h1>

@if ($errors->any())

    <div>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </div>

@endif
<form method="POST" action="{{ route('posts.create-save') }}">
    @csrf
    <label for="">titulo</label>
    <input type="text" name="title" id="title" placeholder="titulo" value="{{ old('title') }}">

    <label for="">Conteudo</label>
    <textarea name="content" id="content" cols="30" rows="4" placeholder="conteudo">{{ old('content') }}</textarea>

    <button type="submit">Enviar</button>

</form>
