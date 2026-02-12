<x-layout>
	<x-slot:title>
		Registreer
	</x-slot:title>
	<section class="px-6 py-8">
		<main class="max-w-lg mx-auto mt-10 bg-gray-100 border border-gray-200 p-6 rounded-xl">
			<h1 class="text-center font-bold text-xl">Registreer een account</h1>
			<form action="/register" method="POST" class="mt-10">
				@csrf
				<x-form.input name="name" />

				<x-form.input name="username" />

				<x-form.input name="email" type="email" autocomplete="username"/>

				<x-form.input name="password" type="password" autocomplete="new-password"/>

				<div class="mb-6 flex justify-end">
					<x-submit-button>Registreer</x-submit-button>
				</div>

				@if($errors->any())
					<ul>
						@foreach($errors->all() as $error)
							<li class="text-red-500 text-xs">{{$error}}</li>
						@endforeach
					</ul>
				@endif
			</form>
			<div class="divider">OF</div>
			<p class="text-center text-sm">
				Heeft u al een account?
				<a href="/login" class="link link-primary">Log in</a>
			</p>
		</main>
	</section>
</x-layout>
