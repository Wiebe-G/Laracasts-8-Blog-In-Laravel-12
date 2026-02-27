<x-layout>
	<x-slot:title>
		Admin gedeelte om posts te zien
	</x-slot:title>

	<x-setting heading="Zie alle posts">
		<span class="font-semibold text-center">Aantal posts: {{ count($posts) }}</span>
		<x-admin-table-parts>
			@foreach ($posts as $post)
				<tr>
					<td class="px-6 py-4 break-all">
						<div class="flex items-center">
							<div class="text-sm font-medium text-gray-900 dark:text-gray-200">
								<a href="{{ route('posts.show', $post->slug) }}">
									Post {{ $post->id }}. Auteur: {{ $post->author->username }}.
									Titel: {{ $post->title }}
								</a>
							</div>
						</div>
					</td>

					<td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
						<a href="{{ route('admin.posts.edit', $post->id) }}"
						   class="text-blue-500 hover:text-blue-600">Bewerk</a>
					</td>

					<td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
						<form method="POST" action="{{ route('admin.posts.destroy', $post->id) }}">
							@csrf
							@method('DELETE')
							<button class="text-xs text-gray-400"
							        onclick="return confirm('Weet u zeker dat u deze post wil verwijderen?')">
								Verwijder
							</button>
						</form>
					</td>
				</tr>
			@endforeach
			{{ $posts->links() }}
		</x-admin-table-parts>
	</x-setting>
</x-layout>
