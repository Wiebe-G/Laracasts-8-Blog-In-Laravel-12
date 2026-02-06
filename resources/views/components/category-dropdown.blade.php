<x-dropdown>
    <x-slot name="trigger">
        <button
            class="flex w-full appearance-none bg-transparent py-2 pl-3 pr-9 text-left text-sm font-semibold lg:inline-flex lg:w-32">
            {{ isset($currentCategory) ? ucwords($currentCategory->name) : 'Categories' }}
            <x-down-arrow class="pointer-events-none absolute"/>
        </button>
    </x-slot>

    <x-dropdown-item href="{{ route('home') }}">Alle posts</x-dropdown-item>

    @foreach ($categories as $category)
        <x-dropdown-item
            href="/?category={{ $category->slug }}&{{http_build_query(request()->except('category'))}}"
            :active="request('category') === $category->slug"
            class="{{ isset($currentCategory) && $currentCategory->is($category) ? 'bg-blue-500 text-white' : '' }}">{{ ucwords($category->name) }}</x-dropdown-item>
    @endforeach
</x-dropdown>
