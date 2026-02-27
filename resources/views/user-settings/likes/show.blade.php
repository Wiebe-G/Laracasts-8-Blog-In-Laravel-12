<x-layout>
	<x-slot:title>
		Uw gelikte posts
	</x-slot:title>
	<x-auth-form>
		<x-user-setting heading="Likes">
			<span class="font-semibold text-center">Aantal posts: {{ $posts->count() }}</span>
			<x-admin-table-parts>
				@forelse ($posts as $post)
					<tr>
						<td class="px-6 py-4 whitespace-nowrap">
							<div class="flex items-center">
								<div class="text-sm font-medium text-gray-900 dark:text-gray-200">
									<a href="{{ route('posts.show', $post->slug) }}"
									   target="_blank">
										{{ $loop->iteration }} : {{ $post->title }}
									</a>
								</div>
							</div>
						</td>

						<td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
							<form method="POST" action="{{ route('like.destroy', $post->id) }}">
								@csrf
								@method('DELETE')
								<button
									class="text-blue-500 hover:text-blue-600"
									onclick="return confirm('Weet u zeker dat u deze like wil verwijderen?')"
									type="submit">Verwijder
								</button>
							</form>
						</td>
					</tr>
				@empty
					<span>
						Geen posts gevonden.
						<br>
						<a href="/" class="link link-primary dark:text-gray-200">Vind wat posts</a>
						die u aanspreken.
					</span>
				@endforelse
				{{ $posts->links() }}
			</x-admin-table-parts>
		</x-user-setting>
	</x-auth-form>
</x-layout>
