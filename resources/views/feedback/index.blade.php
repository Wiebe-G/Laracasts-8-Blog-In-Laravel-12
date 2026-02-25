<x-layout>
	<x-slot:title>
		Feedback geven
	</x-slot:title>
	Feedback? We horen het graag!
	<form method="POST"
	      action="{{ route('feedback.submit') }}">
		@csrf
		<x-auth-form bg="true">

			<x-form.label name="Titel (korte beschrijving)"/>
			<x-form.textarea name="title"/>

			<x-form.label name="Volledige tekst"/>
			<x-form.textarea name="body"/>

			<x-submit-button>
				Verstuur
			</x-submit-button>
		</x-auth-form>
	</form>
</x-layout>
