<!--begin::Form-->
<form {{ $attributes->merge(['class' => 'form']) }}>
    @csrf
    {{ $slot }}
</form>
<!--end::Form-->
