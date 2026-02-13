@props(['name', 'type' => 'text'])
<x-form.field>

	<input
		class="border border-gray-200 rounded p-2 w-full"
		type="{{ $type }}"
		name="{{ $name }}"
		id="{{ $name }}"
		>
		{{ $slot }}
	<x-form.error name="{{ $name }}"/>
</x-form.field>

