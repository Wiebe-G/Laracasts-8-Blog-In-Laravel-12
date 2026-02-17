<x-layout>
	<x-slot:title>
		Log in
	</x-slot:title>
	<section class="px-6 py-8">
		<main class="max-w-lg mx-auto mt-10 bg-gray-100 border border-gray-200 p-6 rounded-xl">
			<h1 class="text-center font-bold text-xl">Log in</h1>
			<form action="/login" method="POST" class="mt-10">
				@csrf
				<x-form.input name="email" type="email" autocomplete="username"/>

				<x-form.input name="password" type="password" autocomplete="current-password"/>

				<div class="mb-6 flex justify-end">
					<x-submit-button>Log in</x-submit-button>
				</div>
			</form>
			<div class="divider">OF</div>
			<p class="text-center text-sm">
				Nog geen account?
				<br>
				<a href="/register" class="link link-primary">
					Maak een account aan
				</a>
			</p>

			@if($errors->any())
				<ul>
					@foreach($errors->all() as $error)
						<li class="text-red-500 text-xs">{{$error}}</li>
					@endforeach
				</ul>
				@endif

		</main>
	</section>
</x-layout>
