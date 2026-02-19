@props(['bg' => false])
@php
//max-w-3xl
	$classes = "max-w-3xl w-screen mx-auto mt-10 p-6 rounded-xl";

	if($bg)
	{
		$classes .= " bg-gray-100 border border-gray-200";
	}
@endphp
<main {{ $attributes(['class' => $classes]) }}>
	{{ $slot }}
</main>
