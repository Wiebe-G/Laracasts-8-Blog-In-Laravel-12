<x-layout>
	<x-slot:title>
		Gegevens wijzigen
	</x-slot:title>
	@php
		$user = auth()->user();
	@endphp
	<x-user-setting heading="Gegevens wijzigen">
		<form action="{{ route('user.settings.update') }}" method="POST" class="mt-10">
			@csrf
			<x-form.label name="naam"/>
			<x-form.textarea name="name">
				{{ $user->name }}
			</x-form.textarea>

			<x-form.label name="gebruikersnaam"/>
			<x-form.textarea name="username">
				{{ $user->username }}
			</x-form.textarea>

			<x-form.label name="email"/>
			<x-form.textarea name="email">
				{{ $user->email }}
			</x-form.textarea>

			<x-form.label name="huidig wachtwoord"/>
			<x-credentials-input name="password" type="password"/>

			<x-form.label name="nieuw wachtwoord"/>
			<x-credentials-input name="new_password" type="password"/>

			<x-form.label name="bevestig nieuw wachtwoord"/>
			<x-credentials-input name="new_password_confirmation" type="password"/>

			<div class="mb-6 flex justify-end">
				<x-submit-button>Update gegevens</x-submit-button>
			</div>

			@if($errors->any())
				<ul>
					@foreach($errors->all() as $error)
						<li class="text-red-500 text-xs">{{$error}}</li>
					@endforeach
				</ul>
			@endif
		</form>
	</x-user-setting>
</x-layout>
