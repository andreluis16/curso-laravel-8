<h1>POSTS</h1>
<a href="{{ route('posts.create-form') }}">Adicionar Novo Post</a>
@foreach ($posts as $post)

<P>{{ $post->title }}</P>
<a href="{{ route('posts.show', $post->id) }}">Ver</a>

@endforeach
