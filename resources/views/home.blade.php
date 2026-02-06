<x-layout>
    @include('homepage-header')
    <div class="flex flex-col items-center gap-3">
    @if ($posts->count())
        <x-posts-grid :posts="$posts"/>

        {{$posts->links()}}
    @else
        <div>Geen posts gevonden</div>
    </div>
    @endif
</x-layout>
