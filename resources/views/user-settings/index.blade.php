<x-layout>
	@php
		$user = auth()->user();
	@endphp
	<h1>Hallo {{ $user->name }}</h1>
</x-layout>
