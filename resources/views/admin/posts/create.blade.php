<x-layout>
	<x-slot:title>
		Admin gedeelte om posts te maken
	</x-slot:title>

	<x-setting heading="Maak een nieuwe post aan">
		<form method="POST" action="/admin/posts" enctype="multipart/form-data">
			@csrf
			<x-form.input name="title" required/>

			<x-form.input name="slug" required/>

			<x-form.input name="thumbnail" type="file" required/>

			<x-form.label name="excerpt"/>
			<x-form.textarea name="excerpt" required/>

			<x-form.label name="body"/>
			<x-form.textarea name="body" required/>

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

			<div class="flex justify-end">
				<x-submit-button>
					Post
				</x-submit-button>
			</div>
		</form>
	</x-setting>
</x-layout>
