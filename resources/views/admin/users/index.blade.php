<x-layout>
	<x-slot:title>
		Admin gedeelte om users te zien
	</x-slot:title>

	<x-setting heading="Zie alle users">
		<span class="font-semibold text-center">Aantal posts: {{ count($users) }}</span>
		<x-admin-table-parts>
			@foreach ($users as $user)
				<tr>
					<td class="px-6 py-4 whitespace-nowrap">
						<div class="flex items-center">
							<div class="text-sm font-medium text-gray-900 dark:text-gray-200">
								<span>
									User {{ $user->id }}. Naam: {{ $user->username }}.
								</span>
							</div>
						</div>
					</td>

					<td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
						<a href="{{ route('profile.show', $user->username) }}"
						   class="text-blue-500 hover:text-blue-600">
							Profiel
						</a>
					</td>
				</tr>
			@endforeach
		</x-admin-table-parts>
	</x-setting>
</x-layout>
