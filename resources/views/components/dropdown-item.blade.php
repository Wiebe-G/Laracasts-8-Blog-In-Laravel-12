@props(['active' => false])

@php
	$classes = 'DropDownButton ';

	if ($active) {
	    $classes .= 'bg-blue-500 text-white';
	}
@endphp
<a {{ $attributes(['class' => $classes]) }}>{{ $slot }}</a>
