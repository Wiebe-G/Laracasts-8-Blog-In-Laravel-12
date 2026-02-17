<x-dropdown>
	@php
		$currentSort = request('sort', 'desc');
	@endphp
	<x-slot name="trigger">
		<button class="py-2 pl-3 pr-9 text-sm font-semibold w-full lg:w-32 text-left flex lg:inline-flex">
			Sorteren

			<x-down-arrow class="pointer-events-none absolute"/>
		</button>
	</x-slot>

	<x-dropdown-item
{{--		href="{{ route('home') }}"--}}
		href="{{ request()->fullUrlWithQuery(['sort' => 'asc']) }}"
		:active="$currentSort === 'asc'"
	>
		Nieuwste post eerst
	</x-dropdown-item>

	<x-dropdown-item
		href="{{ request()->fullUrlWithQuery(['sort' => 'desc']) }}"
		:active="$currentSort === 'desc'"
	>
		Oudste post eerst
	</x-dropdown-item>

	<x-dropdown-item
		href="{{ request()->fullUrlWithQuery(['sort' => 'popular']) }}"
		:active="request()->routeIs('most-popular') && is_null(request()->getQueryString())"
	>
		Populairste posts eerst
	</x-dropdown-item>
</x-dropdown>
