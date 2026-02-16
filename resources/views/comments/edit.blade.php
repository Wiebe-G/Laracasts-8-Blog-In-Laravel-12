<x-layout>
	<x-slot:title>
		Bewerk comment
	</x-slot:title>

	<div class="max-w-2xl mx-auto">
		<h1 class="text-3xl font-bold mt-8">Bewerk comment</h1>

		<div class="card bg-base-100 shadow mt-8">
			<div class="card-body">
				<form method="POST" action="{{ route('comments.update', $comment->id) }}">
					@csrf
					@method('PUT')

					<div class="form-control w-full">
                        <textarea
	                        name="body"
	                        class="textarea textarea-bordered w-full resize-none
	                        @error('body')
	                        textarea-error
	                        @enderror"
	                        rows="4"
	                        maxlength="255"
	                        required
                        >{{ old('body', $comment->body) }}</textarea>

						@error('message')
						<div class="label">
							<span class="label-text-alt text-error">{{ $message }}</span>
						</div>
						@enderror
					</div>

					<div class="card-actions justify-between mt-4">
						<a href="/" class="btn btn-ghost btn-sm">
							Cancel
						</a>
						<button type="submit" class="btn btn-primary btn-sm">
							Update comment
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</x-layout>
