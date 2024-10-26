@props([
	'id' => '',
    'action',
    'loop',
    'mini' => false
])

<!--begin::Item-->
<div class="card {{ ($mini) ? '':'mb-5 ms-md-18' }}" data-theme="dark">
    <!--begin::Body-->
    <div id="accordion_item_{{ $id }}_{{ $action->id }}" class="collapse{{ ($loop->first && !$mini) ? ' show':'' }} fs-6" data-bs-parent="#accordion_{{ $id }}">
        <div class="p-6">
            {{ $slot }}
        </div>
    </div>
    <!--end::Body-->
</div>
<!--end::Item-->
