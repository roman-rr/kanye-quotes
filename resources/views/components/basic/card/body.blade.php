@props([
'dark' => false
])

<!--begin::Card body-->
<div {{ $attributes->merge(['class' => 'card-body']) }} @if($dark) data-theme="dark" @endif>
    {{ $slot }}
</div>
<!--end::Card body-->
