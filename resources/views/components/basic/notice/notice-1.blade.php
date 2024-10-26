@props([
'class' => 'gray',
'text' => '',
])

<!--begin::Notice-->
<div class="notice d-flex bg-light-{{ $class }} rounded border-{{ $class }} border border-dashed p-6">
    <!--begin::Wrapper-->
    <div class="d-flex flex-stack flex-grow-1">
        <!--begin::Content-->
        <div class="fw-semibold">
            <div class="fs-6 text-gray-700">{!! $text !!}</div>
        </div>
        <!--end::Content-->
    </div>
    <!--end::Wrapper-->
</div>
<!--end::Notice-->
