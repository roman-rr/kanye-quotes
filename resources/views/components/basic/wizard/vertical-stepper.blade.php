@props([
'step',
'title',
'subtitle'
])


<!--begin::Step {{ $step }}-->
<div class="stepper-item {{ ($step == 1) ? 'current':'' }}" data-kt-stepper-element="nav">
    <!--begin::Wrapper-->
    <div class="stepper-wrapper">
        <!--begin::Icon-->
        <div class="stepper-icon w-40px h-40px">
            <i class="stepper-check fas fa-check"></i>
            <span class="stepper-number">{{ $step }}</span>
        </div>
        <!--end::Icon-->
        <!--begin::Label-->
        <div class="stepper-label">
            <h3 class="stepper-title">{{ $title }}</h3>
            <div class="stepper-desc">{{ $subtitle }}</div>
        </div>
        <!--end::Label-->
    </div>
    <!--end::Wrapper-->
    <!--begin::Line-->
    <div class="stepper-line h-40px"></div>
    <!--end::Line-->
</div>
<!--end::Step {{ $step }}-->
