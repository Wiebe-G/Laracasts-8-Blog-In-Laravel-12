@props(['name'])
<x-form.field>
	<textarea
		class="border border-gray-200 rounded p-2 w-full
		resize-none"
		type="text"
		name="{{ $name }}"
		id="{{ $name }}"
		required>
		{{ $slot ?? old($name) }}
		</textarea>

	<x-form.error name="{{ $name }}"/>
</x-form.field>
