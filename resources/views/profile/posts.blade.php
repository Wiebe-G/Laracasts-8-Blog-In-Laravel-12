<x-layout>
	<x-slot:title>
		Posts van {{ $user->username }}
	</x-slot:title>
	<a href="{{ route('profile.show', $user->username) }}"
	   class="link link-primary">
		Terug
	</a>
	<br>

	@forelse($user->posts as $post)
		<x-featured-card :post="$post"/>
	@empty
		<span class="text-center font-bold">Geen posts voor deze user</span>
	@endforelse
</x-layout>
