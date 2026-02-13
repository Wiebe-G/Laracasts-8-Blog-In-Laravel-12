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

<body style="font-family: Open Sans, sans-serif">
<section class="px-6 py-8">
	<nav class="md:flex md:items-center md:justify-between navbar">
		<div class="navbar-start">
			<a href="/">
				<img src="/images/logo.svg" alt="Laracasts Logo" width="165" height="16">
			</a>
		</div>

		<div class="navbar-end gap-2">
			@auth
				<x-dropdown>
					<x-slot name="trigger">
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
			<div class="mt-8 md:mt-0 navbar-center">
				<a href="#Footer"
				   class="ml-3 rounded-full bg-blue-500 px-5 py-3 text-xs font-semibold uppercase text-white">
					Subscribe for Updates
				</a>
			</div>
		</div>
	</nav>

	{{-- Chirper flash message --}}
	<x-flash/>

	<main class="mx-auto mt-6 max-w-6xl space-y-6 lg:mt-20">
		{{ $slot }}
	</main>

	<footer class="mt-16 rounded-xl border border-black border-opacity-5 bg-gray-100 px-10 py-16 text-center"
	        id="Footer">
		<img src="/images/lary-newsletter-icon.svg" alt="" class="mx-auto -mb-6" style="width: 145px;">
		<h5 class="text-3xl">Stay in touch with the latest posts</h5>
		<p class="mt-3 text-sm">Promise to keep the inbox clean. No bugs.</p>

		<div class="mt-10">
			<div class="relative mx-auto inline-block rounded-full lg:bg-gray-200">
				{{--Wou dit doen maar mailchimp signup werkt niet  --}}
				<form method="POST" action="#" class="text-sm lg:flex">
					<div class="flex items-center lg:px-5 lg:py-3">
						<label for="email" class="hidden lg:inline-block">
							<img src="/images/mailbox-icon.svg" alt="mailbox letter">
						</label>

						<input id="email" type="text" placeholder="Your email address"
						       class="py-2 pl-4 focus-within:outline-none lg:bg-transparent lg:py-0">
					</div>

					<button
						type="submit"
						class="mt-4 rounded-full bg-blue-500 px-8 py-3 text-xs font-semibold uppercase text-white transition-colors duration-300
				        hover:bg-blue-600 lg:ml-3 lg:mt-0">
						Subscribe
					</button>
				</form>
			</div>
		</div>
	</footer>
</section>
</body>
