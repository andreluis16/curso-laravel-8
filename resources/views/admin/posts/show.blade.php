<h1>Detalhes do Post {{ $post->title }}</h1>
<ul>
    <li>
    <strong>TItulo: </strong>{{ $post->title }}
    </li>
    <li>
      <strong>Conteudo: </strong>{{ $post->content }}
    </li>
</ul>

<form action="{{ route('posts.edit', $post->id ) }}">
    @csrf
    <button>Editar o Post {{ $post->title }}</button>
</form>
<form action="{{ route('posts.destroy', $post->id ) }}" method="POST">
    @csrf
    <input type="hidden" name="_method" value="DELETE">
    <button>Deletar o Post {{ $post->title }}</button>
</form>
