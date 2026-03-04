<x-layout>
	<x-slot:title>
		Notificaties
	</x-slot:title>

	<x-user-setting heading="Notificaties">
		@foreach($posts as $post)
			<div class="flex mb-4">
				<img src="{{ asset('storage/' . $post->thumbnail) }}" alt="Post Thumbnail"
				     class="rounded-full ml-6 border-2 border-green-500 h-[50px] w-[50px]">
				<div class="flex flex-col">
						<span class="font-bold">
							<a href="{{ route('posts.show', $post->slug) }}"
							   class="link link-primary dark:text-gray-200">
							Titel: {{ $post->title }}
							</a>
						</span>
					<span>
						<a href="{{ route('profile.show', $post->author->username) }}"
						   class="link link-primary dark:text-gray-200">
							Auteur: {{ $post->author->username }}
						</a>
					</span>
				</div>
			</div>
		@endforeach
	</x-user-setting>
</x-layout>
