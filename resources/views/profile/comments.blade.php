<x-layout>
	<x-slot:title>
		Comments van user
	</x-slot:title>

	<a href="{{ route('profile.show', $user->username) }}"
	   class="link link-primary">
		Terug
	</a>
	<br>
	@forelse($user->comments as $comment)
		<span>
			<a href="{{ route('posts.show', $comment->post->slug) }}">
				<x-post-comment :comment="$comment"/>
			</a>
		</span>
	@empty
		<span>Geen comments van deze user</span>
	@endforelse
</x-layout>
