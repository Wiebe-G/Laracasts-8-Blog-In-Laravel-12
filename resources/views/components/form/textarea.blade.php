@props(['name', 'type' => 'text'])
<x-form.field>
	<textarea
		class="border border-gray-200 rounded p-2 w-full
		resize-none"
		type="{{ $type }}"
		name="{{ $name }}"
		id="{{ $name }}"
		required
		{{ $attributes(['value'=> old($name)]) }}>{{ $slot ?? old($name) }}
		</textarea>

	<x-form.error name="{{ $name }}"/>
</x-form.field>
