@props(['bg'])
@php
	$classes = "w-screen max-w-3xl mx-auto mt-10 p-6 rounded-xl";

	if($bg)
	{
		$classes .= " bg-gray-100 border border-gray-200";
	}
@endphp
<main {{ $attributes(['class' => $classes]) }}>
	{{ $slot }}
</main>
