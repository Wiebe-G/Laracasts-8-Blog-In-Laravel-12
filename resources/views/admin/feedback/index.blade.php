<x-layout>
	<x-slot:title>
		Admin gedeelte om feedback te zien
	</x-slot:title>

	<x-setting heading="Zie alle feedback">
		<span class="font-semibold text-center">Aantal feedback: {{ count($feedback) }}</span>
		<x-admin-table-parts>
			{{--TODO: Filteren op posts waarop nog niet is gereageerd--}}
			@foreach ($feedback as $iterator)
				<tr class="max-w-screen">
					<td class="px-6 py-4 whitespace-normal break-all">
						<div class="flex items-center">
							<div class="text-sm font-medium text-gray-900 dark:text-gray-200">
								<span>
									<a href="{{ route('admin.feedback.showOne', $iterator->id) }}">
										Gebruiker: {{ $iterator->user->username }}.
									<br>
									Titel: {{ $iterator->title }}
									</a>
									<br>
									@if($iterator->reply)
										<span class="text-sm text-blue-400">Gereageerd op dit bericht</span>
									@endif
								</span>
							</div>
						</div>
					</td>
				</tr>
			@endforeach
		</x-admin-table-parts>
	</x-setting>
</x-layout>
