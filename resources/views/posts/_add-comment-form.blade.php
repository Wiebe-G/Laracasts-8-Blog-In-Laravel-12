@auth
	<x-panel>
		<form method="POST" action="/posts/{{ $post->slug }}/comments">
			@csrf
			<header class="flex items-center">
				<img src="https://i.pravatar.cc/60?u={{auth()->id() ?? 0 }}"
				     alt="Avatar"
				     width="40"
				     height="40"
				     class="rounded-full ">
				<h2 class="ml-3">Doe mee met de discussie</h2>
			</header>

			<x-form.field>
				<x-form.field>
					<textarea
						class="border border-gray-200 rounded p-2 w-full
						resize-none"
						type="text"
						name="body"
						id="commentBody"
						placeholder="Wat vindt je?"
						required>

						</textarea>
					<x-form.error name="body"/>
				</x-form.field>
			</x-form.field>

			</div>

			<div class="flex justify-end">
				<x-submit-button>Post</x-submit-button>
			</div>
		</form>
	</x-panel>
@else
	<div>
		<h1 class="font-bold">Niet ingelogd</h1>
		<span>
				<a href="/login"
				   class="link link-primary text-blue-300">
					Log in
				</a> om reacties te posten
			</span>
	</div>
@endauth
