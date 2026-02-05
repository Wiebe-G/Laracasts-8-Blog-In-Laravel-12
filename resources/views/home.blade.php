<x-layout>
	@include('homepage-header')
	<div class="flex flex-col items-center gap-3">
		{{-- <x-homepage-header :categories="$categories" /> --}}
		@if ($posts->count())
			<x-posts-grid :posts="$posts" />
		@else
			<div>Geen posts gevonden</div>
	</div>
	@endif
</x-layout>
