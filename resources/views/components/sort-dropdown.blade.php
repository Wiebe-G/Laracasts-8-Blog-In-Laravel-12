<x-dropdown>
	@php
		$currentSort = request('sort', 'asc');

		$desc = "";
		switch($currentSort)
		{
            case 'desc':
				$desc = "oudste posts";
			break;
			case 'popular':
				$desc = "populairste posts";
			break;
            case 'asc':
            default:
				$desc = "nieuwste posts";
			break;

		}
	@endphp
	<x-slot name="trigger">
		<button class="py-2 pl-3 pr-9 text-sm font-semibold w-full lg:w-32 text-left flex lg:inline-flex">
			{{ isset($currentSort) ? ucwords($desc) : 'sorteren' }}

			<x-down-arrow class="pointer-events-none absolute"/>
		</button>
	</x-slot>

	<x-dropdown-item
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
		:active="$currentSort === 'popular'"
	>
		Populairste posts eerst
	</x-dropdown-item>
</x-dropdown>
