@props([
    'action',
    'user',
    'id' => '',
    'loop',
    'mini' => false,
    'icon'
])
<!--begin::Timeline item-->
<div class="timeline-item">
    <!--begin::Timeline line-->
    <div class="timeline-line {{ ($mini) ? 'w-25px':'w-40px' }}"></div>
    <!--end::Timeline line-->
    <!--begin::Timeline icon-->
    <div class="timeline-icon symbol symbol-circle {{ ($mini) ? 'symbol-30px':'symbol-40px' }} text-hover-primary {{ (!$loop->first || $mini) ? ' collapsed':'' }}" data-bs-toggle="collapse" data-bs-target="#accordion_item_{{ $id }}_{{ $action->id }}">
        <div class="symbol-label bg-light accordion-icon">
            <x-icon name="{{ $icon['name'] }}" class="{{ $icon['class'] }} {{ ($mini) ? 'svg-icon-4':'svg-icon-2' }}"/>
        </div>
    </div>
    <!--end::Timeline icon-->
    <!--begin::Timeline content-->
    <div class="timeline-content mt-n2 {{ ($mini) ? 'mb-0':'mb-5' }}">
        <x-basic.timeline.components.heading>
            <x-basic.timeline.components.title
                :action="$action"
                :user="$user"
                id="{{ $id }}"
                :loop="$loop"
                mini="{{ $mini }}"
            />
        </x-basic.timeline.components.heading>
        @if(!empty($slot))
            <x-basic.timeline.components.details>
                {{ $slot }}
            </x-basic.timeline.components.details>
        @endif
    </div>
    <!--end::Timeline content-->
</div>
<!--end::Timeline item-->
