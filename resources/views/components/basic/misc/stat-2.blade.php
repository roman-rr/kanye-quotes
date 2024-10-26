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
<div class="border border-dashed border-gray-300 w-150px rounded my-3 p-4 me-6">
    <!--begin::Number-->
    <div class="d-flex align-items-center">
        <div class="fs-1 fw-bold text-gray-800 lh-1"
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
        @if(!empty($svg))
            <x-icon :name="$svg" class="{{$svg_class}}" />
        @endif
    </div>
    <!--end::Number-->
    <!--begin::Label-->
    <div class="fs-6 fw-semibold text-muted d-block lh-1 pt-2">{{ $sub_title }}</div>
    <!--end::Label-->
</div>
<!--end::Stat-->
