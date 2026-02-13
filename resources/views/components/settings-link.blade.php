@props(['name'])
<a href="/settings/{{ $name }}"
   class="{{ request()->is("settings/$name") ? 'text-blue-500' : '' }}">
	{{ \Illuminate\Support\Str::ucwords($name)}}
</a>
<br>
