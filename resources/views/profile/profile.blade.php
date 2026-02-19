<x-layout>
	<x-slot:title>
		Profiel van {{ $user->username }}
	</x-slot:title>
	@php
		$selected = "posts";
		$role = "Gebruiker";
		if($user->is_admin == true)
		{
				$role = "admin";
		}
	@endphp
	<x-auth-form :bg="true">
		<div class="flex items-center justify-center gap-6 w-full">

			<div class="text-center w-full">
				<h1 class="font-semibold text-center col-span-4">profiel van {{ $user->username }}</h1>
				<span>Rol: {{ $role }}</span>
				<br>
				<span>
					Bio:
					<br>
					{{ $user->bio }}
				</span>
				<br>
				<span>
					Lid sinds: {{ $user->created_at }}
				</span>
				<br>
			</div>

			<div class="rounded-full ml-6 border-2 border-green-500">
				<img src="{{ asset('storage/' . $user->avatar) }}" alt=""
				     class=" z-10 w-28 h-fit ">
			</div>
		</div>

		<div class="w-full">
			<div class="w-full flex text-center">
				<div class="w-1/2 link link-primary">
					<a href="{{ route('profile.posts', $user->username) }}">Posts</a>
				</div>
				<div class="w-1/2 link link-primary">
					<a href="{{ route('profile.comments', $user->username) }}">
						Comments
					</a>
				</div>
			</div>
		</div>
	</x-auth-form>
</x-layout>

