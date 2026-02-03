<x-layout>
	<h1 class="text-center font-bold">Blog </h1>
	<div class="flex flex-col items-center gap-3">

		<?php foreach($posts as $post) : ?>
		<article>
			<h1>
				<a href="/posts/<?= $post->slug ?>">
					Titel: <?= $post->title ?>
				</a>
			</h1>
			<p>Datum: <?= $post->date ?></p>
			{{-- <p>Body: <?= $post->body ?></p> --}}
			<p>Excerpt: <?= $post->excerpt ?></p>
		</article>
		<?php endforeach; ?>
	</div>

</x-layout>
