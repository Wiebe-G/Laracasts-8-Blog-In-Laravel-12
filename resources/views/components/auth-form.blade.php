@props(['bg' => false])
@php
	$classes = "max-w-4xl w-screen mx-auto mt-10 p-6 rounded-xl";

	if($bg)
	{
		$classes .= " bg-gray-100 border border-gray-200 dark:bg-gray-700";
	}
@endphp
<main {{ $attributes(['class' => $classes]) }}>
	{{ $slot }}
</main>
