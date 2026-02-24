@props(['heading'])
<section class="px-6 py-8">
	<h1 class="font-bold text-center text-lg mb-8 pb-2 border-b">
		{{ $heading }}
	</h1>

	<div class="flex">
		<aside class="w-48 flex-shrink-0">
			<h4 class="font-semibold mb-4">Links</h4>
			<ul class="w-full">
				<li>
					<x-settings-link name="details"/>
					<x-settings-link name="bookmarks"/>
					<x-settings-link name="likes"/>
					<a href="{{ route('profile.show', auth()->user()->username) }}"
					   class="{{ request()->route()->named('profile.show') ? 'text-blue-500' : '' }}">
						Profiel
					</a>
					<br>
				</li>
			</ul>
		</aside>

		<main class="flex-1">
			<x-panel>
				{{ $slot }}
			</x-panel>
		</main>
	</div>
</section>
