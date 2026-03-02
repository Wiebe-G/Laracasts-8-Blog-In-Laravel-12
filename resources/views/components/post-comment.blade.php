@props(['comment'])
<x-panel class="bg-gray-50 hover:bg-gray-200 dark:bg-gray-700 dark:hover:bg-gray-800">
	<article class="flex space-x-4 ">
		<div class="flex-shrink-0">
			<img src="{{ asset('storage/' . $comment->author->avatar) }}" alt=""
			     class="rounded-full ml-6 border-2 border-green-500" width="50" height="50">
		</div>

		<div>
			<header class="mb-4">
				<a href="{{ route('profile.show', $comment->author->username) }}"
				target="_blank">
					<strong class="font-bold">
						{{$comment->author->username}}
					</strong>
				</a>

				<p class="text-xs">
					Gepost op
					<time>
						{{ $comment->created_at->format('d/m/Y')	 }}
					</time>
					om
					<time>
						{{ $comment->created_at->format('H:i') }}
					</time>
				</p>

				@if($comment->updated_at->gt($comment->created_at->addSeconds(5)))
					<div class="text-xs">Bewerkt op
						<time>
							{{ $comment->updated_at->format('d/m/Y') }}
						</time>
						om
						<time>
							{{ $comment->updated_at->format('H:i') }}
						</time>
					</div>
				@endif
			</header>

			<p>
				{{$comment->body}}
			</p>

			@can('update', $comment)
				<div class="flex gap-1">
					<a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-ghost btn-xs">
						Bewerk
					</a>
					<form method="POST" action="{{ route('comments.destroy', $comment->id) }}">
						@csrf
						@method('DELETE')
						<button type="submit"
						        onclick="return confirm('Weet u zeker dat u deze comment wil verwijderen?')"
						        class="btn btn-ghost btn-xs text-error">
							Delete
						</button>
					</form>
				</div>
			@endcan
		</div>
	</article>
</x-panel>
