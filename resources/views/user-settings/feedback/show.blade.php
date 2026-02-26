<x-layout>
	<x-slot:title>
		Uw feedback
	</x-slot:title>

	<x-user-setting heading="Feedback over {{ $feedback->title }}">
		<x-admin-table-parts>
			<strong class="text-center">Uw feedback:</strong>
			<div>
				<span>Titel: {{ $feedback->title }}</span>
				<br>
				<span>Verdere beschrijving: {{ $feedback->body }}</span>
			</div>
		</x-admin-table-parts>
		@if($feedback->reply)
			<x-admin-table-parts>
				<div>
				<span>Onze reactie komt van admin
					<a href=""
					   class="link link-primary dark:text-blue-200">
						{{ $feedback->reply->user->username }}
					</a>
				</span>
					<br>
					<div class="border-2 text-center">
						<span>{{ $feedback->reply->message }}</span>
					</div>
				</div>
			</x-admin-table-parts>
		@endif
	</x-user-setting>
</x-layout>
