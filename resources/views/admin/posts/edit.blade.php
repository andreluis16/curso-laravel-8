<h1>Editar Post <strong>{{ $post->title }}</strong> </h1>

@if ($errors->any())

    <div>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </div>

@endif
<form method="POST" action="{{ route('posts.update', $post->id) }}">
    @csrf
    @method('put')
    <label for="">titulo</label>
    <input type="text" name="title" id="title" placeholder="titulo" value="{{ $post->title }}">

    <label for="">Conteudo</label>
    <textarea name="content" id="content" cols="30" rows="4" placeholder="conteudo">{{ $post->content }}</textarea>

    <button type="submit">Editar</button>

</form>
