<h1>POSTS</h1>
<a href="{{ route('posts.create-form') }}">Adicionar Novo Post</a>
@foreach ($posts as $post)

<P>{{ $post->title }}</P>

@endforeach
