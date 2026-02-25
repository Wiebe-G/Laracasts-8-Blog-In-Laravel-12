@props(['post'])
<article
	class="rounded-xl border border-black border-opacity-0 transition-colors duration-300 hover:border-opacity-5 hover:bg-gray-100 col-span-6
	max-w-6xl w-full
	dark:hover:bg-gray-700">
	<div class="px-5 py-6 lg:flex min-w-4xl">
		<div class="lg:w-1/2 lg:mr-8 ">
			<img src="{{ asset('storage/' . $post->thumbnail) }}"
			     alt="Blog Post thumbnail"
			     class="rounded-xl object-contain w-full max-h-96 h-auto ">
		</div>

		<div class="flex flex-col justify-between lg:w-1/2">
			<header class="mt-8 lg:mt-0">
				<div class="space-x-2">
					<x-category-button :category="$post->category"/>
				</div>

				<div class="mt-4">
					<h1 class="text-3xl">
						<a href="{{ route('posts.show', $post) }}" class="link link-primary text-black dark:text-white">
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
			</header>

			<div class="mt-2 space-y-4 text-sm">
				{!! nl2br(e($post->excerpt)) !!}
			</div>

			<footer class="mt-auto flex items-center justify-between">
				<div class="flex items-center text-sm">
					<img src="{{ asset('storage/' . $post->author->avatar) }}" alt=""
					     class="rounded-full ml-6 border-2 border-green-500" width="50" height="50">
					<div class="ml-3">
						<h5 class="font-bold">
							<a href="{{ route('profile.show', $post->author->username) }}">
								{{ $post->author->name }}
							</a>
						</h5>
					</div>
				</div>
			</footer>
		</div>
	</div>
</article>
