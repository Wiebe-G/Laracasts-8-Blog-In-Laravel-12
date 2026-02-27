@props(['type', 'post' => null])
@php
	switch($type)
	{
		case 'user':
			$avatar = auth()->user()?->avatar ?? 'avatar';
		break;
		case 'author':
			$post;
            $avatar = $post->author->avatar;
		break;
		default:
			$avatar = 'User avatar';
			break;
	}
@endphp
<img src="{{ asset('storage/' . $avatar) }}" alt="user avatar"
     class="rounded-full ml-6 border-2 border-green-500 h-[50px] w-[50px]">
