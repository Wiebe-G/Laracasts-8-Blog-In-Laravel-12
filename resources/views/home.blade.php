<x-layout>
	<h1 class="text-center font-bold">Blog </h1>
	<div class="flex flex-col items-center gap-3">

		@forelse($posts as $post)
			<article>
				<h1 class="font-bold">
					<a href="/posts/{{ $post->slug }}" class="link link-primary">
						{!! $post->title !!}
					</a>
				</h1>
				<span>Aangemaakt om: {{ $post->created_at }} door <a href="/authors/{{ $post->author->username }}"
						class="link link-primary">{{ $post->author->name }}</a></span>
				<br>
				@if ($post->updated_at->gt($post->created_at->addSeconds(5)))
					<span>Laatst bewerkt om: {{ $post->updated_at }}</span>
				@endif
				<p>
					Categorie:
					<a href="/categories/{{ $post->category->slug }}" class="link link-primary">
						{{ $post->category->name }}</a>
				</p>
				<p>Excerpt: {{ $post->excerpt }}</p>
			</article>
			<div class="mb-5 mt-5 h-1 w-full bg-gray-500"></div>
		@empty
			<div>Geen posts gevonden</div>
		@endforelse
	</div>
</x-layout>
