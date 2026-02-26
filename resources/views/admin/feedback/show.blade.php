<x-layout>
	<x-slot:title>
		Admin gedeelte om feedback te zien
	</x-slot:title>

	<x-setting heading="Feedback van {{ $feedback->user->username }}">
		<x-admin-table-parts>
			<tr>
				<td class="px-6 py-4 whitespace-normal break-all">
					<div class="flex items-center">
						<div class="text-sm font-medium text-gray-900 dark:text-gray-200">
								<span>
									Titel:
									<br>
									{{ $feedback->title }}
									<br>
									Beschrijving:
									<br>
									{{ $feedback->body }}
								</span>
						</div>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					@if($hasReply)
						<span>
							Reactie van admin <span class="text-blue-500">{{ $replyUser->user->username }}</span>.
							<br>
							Reactie is:
							<br>
							{{ $hasReply->message }}
						</span>
					@else
					<form method="POST"
					      action="{{ route('admin.feedback.store', $feedback->id) }}">
						@csrf
						<x-form.textarea name="message" maxlength="255"/>
						<x-submit-button>
							Reageer
						</x-submit-button>
					</form>
					@endif
				</td>
			</tr>
		</x-admin-table-parts>
	</x-setting>
</x-layout>
