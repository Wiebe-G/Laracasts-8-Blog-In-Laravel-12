<x-layout>
	<x-slot:title>
		Admin gedeelte om posts te maken
	</x-slot:title>

	<x-setting :heading="'Bewerk  post: ' . $post->title">
		<form method="POST" action="{{ route('admin.posts.update', $post->id) }}" enctype="multipart/form-data">
			@csrf
			@method('PATCH')

			<x-form.input name="title" :value="old('title', $post->title)"/>

			<x-form.input name="slug" :value="old('slug', $post->slug)"/>

			<div class="flex mt-6">
				<x-form.input name="thumbnail" type="file" :value="old('thumbnail', $post->thumbnail)"/>
				<img src="{{ asset('storage/' . $post->thumbnail) }}" alt="" class="rounded-xl ml-6" width="100">
			</div>

			<x-form.label name="excerpt"/>
			<x-form.textarea name="excerpt">{{ old('excerpt', $post->excerpt) }}</x-form.textarea>

			<x-form.label name="body"/>
			<x-form.textarea name="body">{{ old('body', $post->body) }}</x-form.textarea>

			<x-form.field>
				<x-form.label name="category"/>

				<select name="category_id" id="category_id">
					@foreach( \App\Models\Category::all() as $category)
						<option
							value="{{ $category->id }}"
							{{ old('category_id') == $category->id ? 'selected' : '' }}>{{ ucwords($category->name) }}</option>
					@endforeach
				</select>

				<x-form.error name="category"/>
			</x-form.field>

			<x-form.field>
				<x-form.label name="author"/>
				<select name="user_id" id="user_id">

					@foreach(\App\Models\User::all() as $author)
						<option value="{{ $author->id }}"
						{{ old('user_id', $post->user_id) == $author->id ? 'selected' : '' }}>
							{{ ucwords($author->name) }}
						</option>
					@endforeach
				</select>
			</x-form.field>

			<x-form.field>
				<x-form.label name="published"/>
				<x-form.state-select
					:post="$post"
					:active="$post->published"/>
			</x-form.field>

			<div class="flex justify-end">
				<x-submit-button>
					Update
				</x-submit-button>
			</div>
		</form>
	</x-setting>
</x-layout>
