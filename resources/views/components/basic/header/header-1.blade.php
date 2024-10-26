@props([
'title' => '',
'title_url' => '',
'title_target' => '_self',
'subtitle' => '',
'subtitle_url' => '',
'subtitle_target' => '_self',
'subtitle_class' => ''
])

<!--begin::Header-->
<div class="card-header pt-5">
    <h3 class="card-title align-items-start flex-column">
        <span class="card-label fw-bold text-dark">{{ $title }}</span>
        @if(!empty($subtitle))<span class="text-muted mt-1 fw-semibold fs-7">
            <x-basic.link.link title="{{ $subtitle_url }}" url="{{ $subtitle_url }}" target="{{ $subtitle_target }}" class="{{ $subtitle_class }}">
                {{ $subtitle }}
            </x-basic.link.link>
        </span>
        @endif
    </h3>
    {{ $slot }}
</div>
<!--end::Header-->
