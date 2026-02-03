<x-layout>
	<h1 class="text-center font-bold">Blog </h1>
	<div class="flex flex-col items-center gap-3">

		@forelse($posts as $post)
			<article>
				<h1>
					<a href="/posts/{{ $post->slug }}">
						Titel: {{ $post->title }}
					</a>
				</h1>
				<p>Datum: {{ $post->date }}</p>
				{{-- <p>Body: <?= $post->body ?></p> --}}
				<p>Excerpt: {{ $post->excerpt }}</p>
			</article>
			<div class="mb-5 mt-5 h-px w-full bg-gray-500"></div>
		@empty
			<div>Geen posts gevonden</div>
			< @endforelse
	</div>

</x-layout>
