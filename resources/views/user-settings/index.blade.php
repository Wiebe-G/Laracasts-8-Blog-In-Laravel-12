<x-layout>
	<x-slot:title>
		Instellingen
	</x-slot:title>
	@php
		$user = auth()->user();
	@endphp
	<h1>Hallo {{ $user->name }}</h1>
	<x-user-setting heading="Hallo">
		<h1>hi</h1>
	</x-user-setting>
</x-layout>
