<header class="mx-auto mt-20 max-w-xl text-center ">
	<h1 class="text-4xl">
		Nieuwste <span class="text-blue-500">laravel blog</span> posts
	</h1>

	<div class="mt-8 flex flex-col space-y-2 lg:flex-row lg:space-x-4 lg:space-y-0">
		<!--  Categorie -->
		<div class="flex items-center rounded-xl bg-gray-100 px-3 h-10 lg:inline-flex dark:bg-gray-700">
			<x-category-dropdown/>
		</div>

		<!-- Zoeken -->
		<div class="relative flex items-center rounded-xl bg-gray-100 px-3 h-10 lg:inline-flex dark:bg-gray-700 dark:text-gray-200">
			<form method="GET" action="/">
				@if (request('category'))
					<input type="hidden" name="category" value="{{ request('category') }}">
				@endif
				<input type="text" name="search" placeholder="Vind iets"
				       class="bg-transparent text-sm font-semibold placeholder-black  value="{{ request('search') }}">
			</form>
		</div>

		<!-- Sorteren -->
		<div class="relative flex items-center rounded-xl bg-gray-100 px-3 h-10 lg:inline-flex dark:bg-gray-700">
			<x-sort-dropdown/>
		</div>
	</div>
</header>
