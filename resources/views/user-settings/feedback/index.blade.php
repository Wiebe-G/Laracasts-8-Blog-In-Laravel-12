<x-layout>
	<x-slot:title>
		Al uw feedback
	</x-slot:title>

	<x-auth-form>
		<x-user-setting heading="Uw feedback">
			<x-admin-table-parts>
				<ul>
				@forelse($userFeedback as $feedback)
					<li><a href="{{ route('user.settings.showFeedback', $feedback->id) }}">{{ $loop->iteration }} : {{ $feedback->title }}</a></li>
					{{ $userFeedback->links() }}
					@empty
						<span>U heeft nog geen feedback geleverd</span>
				@endforelse
				</ul>
			</x-admin-table-parts>
		</x-user-setting>
	</x-auth-form>
</x-layout>
