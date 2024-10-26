@props([
'checked',
'id',
'value',
'for',
'title'
])

<!--begin::Switch-->
<div {{ $attributes->merge(['class' => 'form-check form-switch form-check-custom form-check-solid']) }}>
    <input class="form-check-input" type="checkbox" value="{{ $value }}" id="{{ $id }}" {{ ($checked) ? 'checked="checked"':'' }} />
    <label class="form-check-label fw-semibold text-gray-400 ms-3" for="{{ $for }}">{{ $title }}</label>
</div>
<!--end::Switch-->
