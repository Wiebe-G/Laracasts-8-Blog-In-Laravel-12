<x-layout>
	<x-slot:title>
		Registreer
	</x-slot:title>
	<x-auth-form :bg="true">
		<h1 class="text-center font-bold text-xl">Registreer een account</h1>
		<form action="{{ route('register.store') }}" method="POST" class="mt-10">
			@csrf
			<x-form.input name="name"/>

			<x-form.input name="username"/>

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
			<br>
			<a href="{{ route('login') }}" class="link link-primary dark:text-gray-200">Log in</a>
		</p>
	</x-auth-form>
</x-layout>
