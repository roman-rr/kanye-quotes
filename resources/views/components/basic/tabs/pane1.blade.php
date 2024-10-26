@props([
	'id',
    'active' => false
])

<!--begin:::Tab pane-->
<div class="tab-pane fade {{ ($active) ? 'show active':'' }}" id="{{ $id }}" role="tabpanel">
    {{ $slot }}
</div>
<!--end:::Tab pane-->
