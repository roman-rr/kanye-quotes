@props([
'checked',
'id',
'value',
'for',
'title'
])

<!--begin::Checkbox-->
<div {{ $attributes->merge(['class' => 'form-check form-check-custom form-check-solid']) }}>
    <input class="form-check-input" type="checkbox" value="{{ $value }}" id="{{ $id }}" {{ ($checked) ? 'checked="checked"':'' }} />
    <label class="form-check-label ms-3" for="{{ $for }}">{{ $title }}</label>
</div>
<!--end::Checkbox-->
