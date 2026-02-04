<x-layout>
	<article>
		<h1>{!! $post->title !!}</h1>

		<p>
			Door <a href="/authors/{{ $post->author->username }}" class="link link-primary">{{ $post->author->name }}</a> in
			<a href="/categories/{{ $post->category->slug }}" class="link link-primary">{{ $post->category->name }}</a>
		</p>

		<div>
			{!! $post->body !!}
		</div>
	</article>

	<a href="/" class="link link-primary">Terug naar homepagina</a>
</x-layout>
