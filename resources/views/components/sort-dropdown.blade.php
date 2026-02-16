<x-dropdown>
	<x-slot name="trigger">
		<button class="py-2 pl-3 pr-9 text-sm font-semibold w-full lg:w-32 text-left flex lg:inline-flex">
			{{ isset($currentSorting) ? ucwords($currentSorting->name) : 'Sorteren' }}

			<x-down-arrow class="pointer-events-none absolute"/>
		</button>
	</x-slot>

	<x-dropdown-item
		href="{{ route('home') }}"
		:active="request()->routeIs('home') && is_null(request()->getQueryString())"
	>
		Nieuwste post eerst
	</x-dropdown-item>

	<x-dropdown-item
		href="/?sorting=oldest"
		:active="request()->routeIs('oldest') && is_null(request()->getQueryString())"
	>
		Oudste post eerst
	</x-dropdown-item>

	<x-dropdown-item
		href="/?sorting=most-popular"
		:active="request()->routeIs('most-popular') && is_null(request()->getQueryString())"
	>
		Populairste posts eerst
	</x-dropdown-item>
</x-dropdown>
