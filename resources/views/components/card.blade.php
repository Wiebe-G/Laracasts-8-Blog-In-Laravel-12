@props(['post'])
<article
	{{ $attributes->merge(['class' => 'flex flex-col h-full rounded-xl
							border border-black border-opacity-0 transition-colors duration-300
							hover:border-opacity-5 hover:bg-gray-100 dark:hover:bg-gray-700']) }}>
	<div class="px-5 py-6 flex flex-col flex-1">
		<div class="aspect-[16/9] w-full flex items-center justify-center rounded-xl">
			<img src="{{ asset('storage/' . $post->thumbnail) }}"
			     alt="Blog Post illustration"
			     class="h-96 bg-base-200 w-full object-contain">
		</div>

		<div class="mt-8 flex flex-col flex-1">
			<header>
				<div class="space-x-2">
					<x-category-button :category="$post->category"/>
				</div>


					<x-post-title-and-timer :post="$post"/>

			</header>

			<div class="mt-4 space-y-4 text-sm ">
				{!! nl2br(e($post->excerpt)) !!}
			</div>

			<footer class="mt-auto flex items-center justify-between">
				<div class="flex items-center text-sm">
					<x-avatar type="author" :post="$post"/>
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
