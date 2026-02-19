<!doctype html>
<html lang="en" data-theme="lofi" class="scroll-smooth">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>{{ isset($title) ? $title . ' - Blog' : 'Blog' }}</title>
	<link rel="preconnect" href="<https://fonts.bunny.net>">
	<link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet"/>
	<link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css"/>
	<link href="https://cdn.jsdelivr.net/npm/daisyui@5/themes.css" rel="stylesheet" type="text/css"/>
	<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
	@vite(['resources/css/app.css', 'resources/js/app.ts'])
</head>

<body style="font-family: Open Sans, sans-serif" class="min-h-screen flex flex-col">
<section class="px-6 py-8 flex flex-col flex-1">
	<nav class="md:flex md:items-center md:justify-between navbar">
		<div class="navbar-start">
			<a href="/">
				<img src="/images/logo.svg" alt="Laracasts Logo" width="165" height="16">
			</a>
		</div>

		<div class="navbar-end gap-2">
			@auth
				@if(auth()->user()->avatar == null)
					<span class="text-error text-xs">Geen avatar gevonden</span>
				@else
					<img src="{{ asset('storage/' . auth()->user()->avatar) }}" alt="" class="rounded-full ml-6 border-2 border-green-500" width="50" height="50">
				@endif
				<x-dropdown>
					<x-slot name="trigger" class="flex flex-row">
						<button class="text-sm">
							Welkom, {{ auth()->user()->username }}
						</button>
					</x-slot>

					@can('admin')
						<x-dropdown-item href="{{ route('admin.posts.create') }}" :active="request()->is('admin/posts/create')">
							Nieuwe post
						</x-dropdown-item>
						<x-dropdown-item href="{{ route('admin.posts.store') }}" :active="request()->is('admin/posts')">
							Alle posts
						</x-dropdown-item>
					@endcan
					<x-dropdown-item
						href="{{ route('user.bookmarks') }}">
						Instellingen
					</x-dropdown-item>
					<x-dropdown-item href="#" x-date="{}"
					                 @click.prevent="document.querySelector('#logout-form').submit()">Log uit
					</x-dropdown-item>

					<form id="logout-form" method="POST" action="{{ route('logout') }}" class="hidden">
						@csrf
						<button type="submit" class="btn btn-ghost btn-sm">Log uit</button>
					</form>
				</x-dropdown>
			@else
				<a href="/login" class="btn btn-ghost btn-sm">Log in</a>
				<a href="/register" class="btn btn-primary btn-sm">Maak account aan</a>
			@endauth
		</div>
	</nav>

	{{-- Chirper flash message --}}
	<x-flash/>

	<main class="mx-auto mt-6 max-w-6xl space-y-6 lg:mt-20 flex-1">
		{{ $slot }}
	</main>

	<footer class="mt-16 rounded-xl border border-black border-opacity-5 bg-gray-100 px-10 py-16 text-center"
	        id="Footer">
		<div>
			<p>© {{ now()->year }} blog - Built with Laravel and ❤️</p>
		</div>
	</footer>
</section>
</body>
