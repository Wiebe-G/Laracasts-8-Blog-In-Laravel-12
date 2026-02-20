@props(['posts'])

<x-featured-card :post="$posts[0]" class="col-span-6"/>
<div class="lg:grid lg:grid-cols-6 w-full gap-4 auto-rows-fr">
	@if(count($posts) > 1)
		@forelse($posts->skip(1) as $post)
			<x-card :post="$post" class="{{ $loop->iteration < 3 ? 'col-span-3' : 'col-span-2' }} "/>
		@empty
			<span>Geen posts gevonden</span>
		@endforelse
	@endif
</div>
