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
					<a href="/settings/display"
					   class="{{ request()->is('settings/display') ? 'text-blue-500' : '' }}">
						Display instellingen
					</a>
					<br>
					<a href="/settings/bookmarks"
					   class="{{ request()->is('settings/bookmarks') ? 'text-blue-500' : '' }}">
						Posts in uw bookmarks
					</a>
					<a href="/settings/likes"
					   class="{{ request()->is('settings/likes') ? 'text-blue-500' : '' }}">
						Posts die u geliket heeft
					</a>
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
