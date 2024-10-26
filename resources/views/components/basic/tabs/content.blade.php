@props([
	'id'
])

<!--begin:::Tab content-->
<div class="tab-content" id="{{ $id }}">
    {{ $slot }}
</div>
<!--end:::Tab content-->
