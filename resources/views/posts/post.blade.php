<x-layout>
	<x-slot:title>
		Blogpost van {{ $post->author->username }}
	</x-slot:title>
	<main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
		<article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10">
			<div class="col-span-4 lg:text-center lg:pt-14 mb-10">
				<img src="{{ asset('storage/' . $post->thumbnail) }}" alt="" class="rounded-xl">

				<p class="mt-4 block text-gray-400 text-xs">
					Gepubliceerd om <x-post-timer :post="$post"/>
				</p>

				<div class="flex items-center lg:justify-center text-sm mt-4">
					<x-avatar type="author" :post="$post"/>
					<div class="ml-3 text-left">
						<h5 class="font-bold">
							<a href="{{ route('profile.show', $post->author->username) }}">{{ $post->author->username }}</a>
						</h5>

					</div>
				</div>
				@php
					$isLiked = $post->isLikedBy(auth()->user());
				@endphp
				<div class="flex flex-col space-y-2">
					@auth
						<form method="POST" action="{{ $isLiked
 							? route('like.destroy', $post)
 							: route('like.update', $post)}}">
							@csrf

							@if($isLiked)
								@method('DELETE')
							@endif

							<x-submit-button
								:onList="$isLiked">
								{{ $isLiked
 								? 'Verwijder like'
 								: 'Like post'}}
							</x-submit-button>
							<span>Geliket door {{ $post->liked_by_count}} gebruiker(s)</span>
						</form>


						<form method="POST"
						      action="{{ $post->bookmarkedBy(auth()->user())
 								? route('user.bookmarks.destroy', $post)
 								: route('bookmark.update', $post)}}">
							@csrf

							@if($post->bookmarkedBy(auth()->user()))
								@method('DELETE')
							@endif

							<x-submit-button
								:onList="$post->isBookmarkedBy(auth()->user())">
								{{ $post->isBookmarkedBy(auth()->user())
									? 'Verwijder uit bookmarks'
									: 'Bookmark post' }}
							</x-submit-button>
							<span>Gebookmarkt door {{ $post->bookmarked_by_count  }} gebruiker(s)</span>
						</form>

						{{ $post->views_count }} keer bekeken

						@can('admin')
							<span>
								<a href="{{ route('admin.posts.edit', $post->id) }}"
								   class="link link-primary"
								   target="_blank">
									Bewerk post
								</a>
							</span>
						@endcan

					@else
						<span>
							<a href="{{ route('login') }}" class="link link-primary dark:text-blue-200">Log in</a> om posts te liken of te bookmarken
						</span>
					@endauth
				</div>
			</div>

			<div class="col-span-8">
				<div class="hidden lg:flex justify-between mb-6">
					<a href="{{ route('home') }}"
					   class="transition-colors duration-300 relative inline-flex items-center text-lg hover:text-blue-500">
						<svg width="22" height="22" viewBox="0 0 22 22" class="mr-2">
							<g fill="none" fill-rule="evenodd">
								<path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
								</path>
								<path class="fill-current"
								      d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
								</path>
							</g>
						</svg>

						Terug naar posts
					</a>

					<div class="space-x-2">
						<x-category-button :category="$post->category"/>
					</div>
				</div>

				<h1 class="font-bold text-3xl lg:text-4xl mb-10">
					{{ $post->title }}
				</h1>

				<div class="space-y-4 lg:text-lg leading-loose">
					{!!  nl2br(e($post->body)) !!}
				</div>
			</div>

			<section class="col-span-8 col-start-5 mt-10 space-y-6">
				@include('posts._add-comment-form')

				<span>{{ $post->comments_count }} comments</span>
				@forelse($post->comments as $comment)
					<x-post-comment :comment="$comment"/>
				@empty
					<div>Nog geen comments. Wees de eerste!</div>
				@endforelse
			</section>
		</article>
	</main>
</x-layout>

