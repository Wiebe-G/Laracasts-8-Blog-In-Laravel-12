@props(['trigger'])
{{-- Trigger --}}
<div x-data="{ show: false }" @click.outside="show = false" class="relative ">
	<div @click="show = ! show">
		{{ $trigger }}
	</div>
	{{-- Links --}}
	<div x-show="show"
	     class="absolute right-0 z-50 mt-2 max-h-52 min-w-max overflow-auto rounded-xl bg-gray-100 py-2 dark:bg-gray-700">
		{{ $slot }}
	</div>
</div>
