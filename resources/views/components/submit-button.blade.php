@props(['onList'=> false])
<button type="submit"
	{{ $attributes->merge([
	'class' => $onList
		? 'bg-red-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl w-full
			hover:bg-red-600 dark:bg-red-500'
		: 'bg-blue-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl w-full
			hover:bg-blue-600 dark:bg-blue-800']) }}>
	{{ $slot }}
</button>
