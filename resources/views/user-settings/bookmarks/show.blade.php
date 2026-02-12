<x-layout>
	<x-slot:title>
		Alle bookmarks
	</x-slot:title>

	<x-user-setting heading="Bookmarks">
		<span class="font-semibold text-center">Aantal posts: {{ $posts->count() }}</span>
		<div class="flex flex-col">
			<div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
				<div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
					<div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
						<table class="min-w-full divide-y divide-gray-200">
							<tbody class="bg-white divide-y divide-gray-200">
							@foreach ($posts as $post)
								<tr>
									<td class="px-6 py-4 whitespace-nowrap">
										<div class="flex items-center">
											<div class="text-sm font-medium text-gray-900">
												<a href="/posts/{{ $post->slug }}"
												   target="_blank">
													{{ $loop->iteration }} : {{ $post->title }}
												</a>
											</div>
										</div>
									</td>

									<td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
										<form method="POST" action="bookmarks/{{ $post->id }}">
											@csrf
											@method('DELETE')
											{{--Todo: confirm voor verwijderen--}}

											<button
												class="text-blue-500 hover:text-blue-600"
											type="submit">Verwijder
											</button>
										</form>
									</td>

								</tr>
							@endforeach
							{{ $posts->links() }}
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</x-user-setting>
</x-layout>
