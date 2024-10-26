@props([
'dark' => false
])

<!--begin::Card-->
<div {{ $attributes->merge(['class' => 'card']) }} @if($dark) data-theme="dark" @endif>
    {{ $slot }}
</div>
<!--end::Card-->
