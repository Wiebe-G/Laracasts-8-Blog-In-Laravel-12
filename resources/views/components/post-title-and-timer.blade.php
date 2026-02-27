@props(['post'])
<div class="mt-4">
	<h1 class="text-3xl">
		<a href="{{ route('posts.show', $post) }}" class="link link-primary text-black dark:text-white break-words">
			{{ $post->title }}
		</a>
	</h1>


	<span class="mt-2 block text-xs text-gray-400">
	Gepubliceerd om <x-post-timer :post="$post"/>

	@if ($post->updated_at->gt($post->created_at->addSeconds(5)))
			<span>Laatst bewerkt om: {{ $post->updated_at }}</span>
			<br>
		@endif
		{{ $post->views_count }} keer bekeken
</span>
</div>
