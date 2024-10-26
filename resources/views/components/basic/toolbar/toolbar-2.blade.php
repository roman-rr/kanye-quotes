@props([
'title',
'subtitle'
])

<!--begin::Toolbar-->
<div class="d-flex flex-wrap flex-stack pb-8">
    <!--begin::Heading-->
    <h3 class="fw-bold my-2">{{ $title }}
        @if(!empty($subtitle))<span class="fs-6 text-gray-400 fw-semibold ms-1">{{ $subtitle }}</span>@endif
    </h3>
    <!--end::Heading-->
</div>
<!--end::Toolbar-->
