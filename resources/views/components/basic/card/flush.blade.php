@props([
'dark' => false
])

<!--begin::Card-->
<div {{ $attributes->merge(['class' => 'card card-flush']) }} @if($dark) data-theme="dark" @endif>
    {{ $slot }}
</div>
<!--end::Card-->
