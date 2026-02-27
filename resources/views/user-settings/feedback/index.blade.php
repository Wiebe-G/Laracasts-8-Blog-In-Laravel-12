<x-layout>
	<x-slot:title>
		Al uw feedback
	</x-slot:title>

	<x-auth-form>
		<x-user-setting heading="Uw feedback">
			<x-admin-table-parts>
				<ul>
					@forelse($userFeedback as $feedback)
						<td class="px-6 py-4">
							<a href="{{ route('user.settings.showFeedback', $feedback->id) }}">
								{{ $loop->iteration }} : {{ $feedback->title }}
							</a>
						</td>
						@if($feedback->reply)
							<div class="text-sm text-blue-400">Een admin heeft gereageerd!</div>
						@else
							<div>Nog geen reactie</div>
						@endif
					@empty
						<td class="px-6 py-4">U heeft nog geen feedback geleverd</td>
					@endforelse
						{{ $userFeedback->links() }}
				</ul>
			</x-admin-table-parts>
		</x-user-setting>
	</x-auth-form>
</x-layout>
