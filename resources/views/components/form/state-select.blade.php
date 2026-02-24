@props(['active' => null, 'post' => null])
@php

@endphp
<select name="published" id="published" class="dark:bg-gray-700">
	<option value="0"
        @if($active == 0)
			selected
        @endif>
		Draft (niet openbaar)
	</option>

	<option value="1"
       @if($active == 1)
		   selected
       @endif >
		Openbaar
	</option>
</select>
