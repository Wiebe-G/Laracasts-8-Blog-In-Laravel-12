<x-layout>
	<x-slot:title>
		Alle bookmarks
	</x-slot:title>

	<x-auth-form>
		<x-user-setting heading="Bookmarks">
			<span class="font-semibold text-center">Aantal posts: {{ $posts->count() }}</span>
			<div class="flex flex-col">
				<div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
					<div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
						<div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
							<table class="min-w-full divide-y divide-gray-200">
								<tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-700">
								@forelse ($posts as $post)
									<tr>
										<td class="px-6 py-4 whitespace-nowrap ">
											<div class="flex items-center ">
												<div class="text-sm font-medium text-gray-900 dark:text-gray-200">
													<a href="{{ route('posts.show', $post->slug) }}"
													   target="_blank">
														{{ $loop->iteration }} : {{ $post->title }}
													</a>
												</div>
											</div>
										</td>

										<td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
											<form method="POST" action="{{ route('user.bookmarks.destroy', $post->id) }}">
												@csrf
												@method('DELETE')
												<button
													class="text-blue-500 hover:text-blue-600"
													onclick="return confirm('Weet u zeker dat u deze bookmark wil verwijderen?')"
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
									die u wilt bewaren.
								</span>
								@endforelse
								{{ $posts->links() }}
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</x-user-setting>
	</x-auth-form>
</x-layout>
