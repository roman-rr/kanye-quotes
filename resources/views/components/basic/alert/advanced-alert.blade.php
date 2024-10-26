@props([
    'icon' => [],
    'content' => []
])

<!--begin::Alert-->
<div {{ $attributes->merge(['class' => 'alert alert-dismissible d-flex flex-center flex-column py-10 px-10 px-lg-20 mb-0']) }}>
    @unless(empty($icon['name']))
        <x-icon name="{{ $icon['name'] }}" class="{{ $icon['class'] }}"/>
    @endunless
    <!--begin::Wrapper-->
    <div class="text-center">
        @unless(empty($content['title']))
        <!--begin::Title-->
        <h1 class="fw-bold mb-5">
            {{ $content['title'] }}
        </h1>
        <!--end::Title-->
        @endunless
        @unless(empty($content['subtitle']))
            <x-basic.separator.dashed class="border-danger opacity-25 mb-5" />
            <!--begin::Content-->
            <div class="mb-9 text-dark">
                {{ $content['subtitle'] }}
            </div>
        <!--end::Content-->
        @endunless
    </div>
    <!--end::Wrapper-->
</div>
<!--end::Alert-->
