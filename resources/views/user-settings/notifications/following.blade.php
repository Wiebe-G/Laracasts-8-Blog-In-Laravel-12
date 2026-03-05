<x-layout>
	<x-slot:title>
		Gebruikers die u volgt
	</x-slot:title>

	<x-user-setting heading="Gebruikers die u volgt">
		<x-admin-table-parts>
			<div class="flex flex-col text-center">
			@foreach($followees as $following)
				<a href="{{ route('profile.show', $following->username) }}">{{ $following->username }}</a>
			@endforeach
			</div>
		</x-admin-table-parts>
	</x-user-setting>
</x-layout>
