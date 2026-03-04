<x-layout>
	<x-slot:title>
		Profiel van {{ $user->username }}
	</x-slot:title>
	@php
		$role = "Gebruiker";
		if($user->is_admin == true)
		{
				$role = "admin";
		}
	@endphp
	<x-auth-form :bg="true">
		<div class="max-w-4xl mx-auto px-4">
			<div class="flex items-center justify-center gap-6 w-full">
				<div class="text-center w-full">
					<h1 class="font-semibold text-center col-span-4">profiel van {{ $user->username }}</h1>
					<span>Rol: {{ $role }}</span>
					<br>
					<div class="w-full max-w-xl mx-auto">
						<span>Bio:</span>
						<span class="break-words whitespace-pre-line line-clamp-5 text-overflow-none overflow-y-scroll">
						{{ $user->bio }}
					</span>
					</div>
					<br>
					<span>
					Lid sinds: {{ $user->created_at->diffForHumans() }}
				</span>
				</div>

				<div class="rounded-full ml-6 ">
					<img src="{{ asset('storage/' . $user->avatar) }}" alt=""
					     class="z-10 w-full h-fit border-2 border-green-500">
					<span class="flex justify-center">{{ $followerCount }} volger(s)</span>
					<div class="w-full flex justify-center mt-2">
						<form
							action="{{ $isFollowing
								? route('follow.destroy', $user)
								: route('follow.store', $user)}}"
							method="POST">
							@csrf

							@if($isFollowing)
								@method('DELETE')
							@endif

							<x-submit-button
								:onList="$isFollowing">
								{{ $isFollowing
								? 'Stop met volgen' : 'Volg gebruiker' }}
							</x-submit-button>
						</form>
					</div>
				</div>
			</div>


			<div class="w-full grid grid-cols-2 items-start justify-items-center text-center">
				<div>
					<h2>Posts</h2>
					<div class="flex flex-col gap-4 w-full">
						@forelse($posts as $post)
							<a href="{{ route('posts.show', $post->slug) }}"
							   target="_blank"
							   class="border-2 border-blue-500">
								<div class="flex items-center gap-4 max-w-full break-all">
									<img src="{{ asset('storage/' . $post->thumbnail) }}" alt="Post thumbnail"
									     class="rounded-full ml-6 border-2 border-green-500 h-[50px] w-[50px]">
									<div>
										<strong>{{ $post->title }}</strong>
										<p>{{ $post->excerpt }}</p>
									</div>
								</div>
							</a>
						@empty
							<span>Geen posts van deze user</span>
						@endforelse
						{{ $posts->appends(['comments' => request('comments', 1)])->links() }}
					</div>
				</div>

				<div class="mt-0">
					<h2>Comments</h2>
					@forelse($comments as $comment)
						<span>
							<a href="{{ route('posts.show', $comment->post->slug) }}"
							   target="_blank">
								<div class="flex items-center gap-4 max-w-full break-all">
									<img src="{{ asset('storage/' . $user->avatar) }}" alt="Post thumbnail"
									     class="rounded-full ml-6 border-2 border-green-500 h-[50px] w-[50px]">
										<strong>{{ $comment->body }}</strong>
								</div>
							</a>
						</span>
					@empty
						<span>Geen comments van deze user</span>
					@endforelse
					{{ $comments->appends(['posts' => request('posts', 1)])->links() }}
				</div>
			</div>
		</div>
	</x-auth-form>
</x-layout>

