<x-layout>
	<x-slot:title>
		Posts van {{ $user->username }}
	</x-slot:title>
	<a href="{{ route('profile.show', $user->username) }}"
	   class="link link-primary">
		Terug
	</a>
	<br>

	<x-posts-grid :posts="$user->posts"/>
</x-layout>
