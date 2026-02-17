<x-layout>
	<x-slot:title>
		Home pagina
	</x-slot:title>
	@include('posts._homepage-header')
	<div class="flex flex-col items-center gap-3">
		@if ($posts->count())
			<x-posts-grid :posts="$posts"/>

			{{$posts->links()}}
		@else
			<div>Geen posts gevonden</div>
	</div>
	@endif
{{--	<span>--}}
{{--		@foreach($sortedPosts as $sortedPost)--}}
{{--			<span>{{ $loop->iteration }} - {{ $sortedPost->title  }} heeft {{ $sortedPost->likes_count }}</span>--}}
{{--			<br>--}}
{{--		@endforeach--}}
{{--	</span>--}}
</x-layout>
