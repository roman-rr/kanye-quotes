@props([
    'title',
    'sub_title',
    'svg',
    'svg_class',
    'countup',
    'countup_value',
    'countup_prefix',
    'countup_suffix'
])

<!--begin::Stat-->
<div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
    <!--begin::Number-->
    <div class="d-flex align-items-center">
        @if(!empty($svg))
            <x-icon :name="$svg" class="{{$svg_class}}" />
        @endif
        <div class="fs-4 fw-bold"
             @if((isset($countup)) && $countup)
                 data-kt-countup="true"
                 data-kt-countup-value="{{ $countup_value }}"
                 @if(!empty($countup_prefix))
                     data-kt-countup-prefix="{{ $countup_prefix }}"
                 @endif
                 @if(!empty($countup_suffix))
                     data-kt-countup-suffix="{{ $countup_suffix }}"
                @endif
            @endif
        >{{ $title }}</div>
    </div>
    <!--end::Number-->
    <!--begin::Label-->
    <div class="fw-semibold fs-6 text-gray-400">{{ $sub_title }}</div>
    <!--end::Label-->
</div>
<!--end::Stat-->
