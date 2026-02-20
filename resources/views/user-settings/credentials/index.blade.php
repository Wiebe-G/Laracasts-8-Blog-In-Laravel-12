<x-layout>
	<x-slot:title>
		Gegevens wijzigen
	</x-slot:title>
	@php
		$user = auth()->user();
	@endphp
	<x-auth-form>
		<x-user-setting heading="Gegevens wijzigen">
			<form action="{{ route('user.settings.update') }}" method="POST" class="mt-10"
			      enctype="multipart/form-data">
				@csrf
				<x-form.label name="naam"/>
				<x-form.textarea name="name">
					{{ $user->name }}
				</x-form.textarea>

				<x-form.label name="gebruikersnaam"/>
				<x-form.textarea name="username">
					{{ $user->username }}
				</x-form.textarea>

				<div class="flex mt-6">
					<x-form.input name="avatar" type="file" :value="old('avatar', $user->avatar)"/>
					<img src="{{ asset('storage/' . $user->avatar) }}" alt="" class="rounded-xl ml-6" width="100">
				</div>

				<x-form.label name="bio (max 5 regels)"/>
				<x-form.textarea name="bio" maxlength="255">
					{{ $user->bio }}
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

			<form method="POST" action="{{ route('user.settings.destroy', auth()->user()) }}">
				@csrf
				@method('DELETE')
				<x-submit-button class="text-error text-xs"
				                 onclick="return confirm('Weet u zeker dat u uw account wil verwijderen? Dit kan niet ongedaan worden?')"
				                 :onList="true">
					Verwijder account
				</x-submit-button>
			</form>
		</x-user-setting>
	</x-auth-form>
</x-layout>
