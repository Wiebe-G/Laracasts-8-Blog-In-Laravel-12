@props(['trigger'])
{{-- Trigger --}}
<div x-data="{ show: false }" @click.outside="show = false">
	<div @click="show = ! show">
		{{ $trigger }}</div>
	{{-- Links --}}
	<div x-show="show" class="none absolute z-50 mt-2 max-h-52 w-full overflow-auto rounded-xl bg-gray-100 py-2">
		{{ $slot }}
	</div>
</div>
