<x-dropdown>
	<x-slot name="trigger">
		<button class="py-2 pl-3 pr-9 text-sm font-semibold w-full lg:w-32 text-left flex lg:inline-flex dark:bg-gray-700">
			{{ isset($currentCategory) ? ucwords($currentCategory->name) : 'Categorieën' }}

			<x-down-arrow class="pointer-events-none absolute"/>
		</button>
	</x-slot>

	<x-dropdown-item
		href="/?{{ http_build_query(request()->except('category', 'page')) }}"
		:active="request()->routeIs('home') && is_null(request()->getQueryString())"
		class="dark:bg-gray-700"
	>
		Alle posts
	</x-dropdown-item>

	@foreach ($categories as $category)
		<x-dropdown-item
			href="/?category={{ $category->slug }}&{{ http_build_query(request()->except('category', 'page')) }}"
			:active='request()->fullUrlIs("*?category={$category->slug}*")'
		>
			{{ ucwords($category->name) }}
		</x-dropdown-item>
	@endforeach
</x-dropdown>
