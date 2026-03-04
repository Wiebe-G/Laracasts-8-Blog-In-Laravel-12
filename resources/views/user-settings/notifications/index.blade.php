<x-layout>
	<x-slot:title>
		Notificaties
	</x-slot:title>

	<x-user-setting heading="Notificaties">
		@foreach($notifications as $notification)
			<span>{{ $notification->post_id }}</span>
		@endforeach
	</x-user-setting>
</x-layout>
