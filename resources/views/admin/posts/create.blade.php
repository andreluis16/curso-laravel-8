<h1>Cadastrar Novo Post</h1>
<form method="POST" action="{{ route('posts.create-save') }}">
    @csrf
    <label for="">titulo</label>
    <input type="text" name="title" id="title" placeholder="titulo">

    <label for="">Conteudo</label>
    <textarea name="content" id="content" cols="30" rows="4" placeholder="conteudo"></textarea>

    <button type="submit">Enviar</button>

</form>
