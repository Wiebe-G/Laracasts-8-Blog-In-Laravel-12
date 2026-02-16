@props(['comment'])
<x-panel class="bg-gray-50">
<article class="flex  space-x-4 ">
	<div class="flex-shrink-0">
		<img src="https://i.pravatar.cc/60?u={{$comment->user_id}}" alt="Avatar" width="60" height="60"
		     class="rounded-xl">
	</div>

	<div>
		<header class="mb-4">
			<strong class="font-bold">
				{{$comment->author->username}}
			</strong>

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
					<button type="submit" onclick="return confirm('Weet u zeker dat u deze comment wil verwijderen?')"
					        class="btn btn-ghost btn-xs text-error">
						Delete
					</button>
				</form>
			</div>
		@endcan
	</div>
</article>
</x-panel>
