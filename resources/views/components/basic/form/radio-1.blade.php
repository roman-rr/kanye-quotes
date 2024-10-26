@props([
'active',
'title',
'subtitle',
'value',
'name'
])

<label class="btn btn-outline btn-outline-dashed btn-active-light-primary {{ ($active) ? 'active':''}} d-flex text-start p-6" data-kt-button="true">
    <!--begin::Radio button-->
    <span class="form-check form-check-custom form-check-solid form-check-sm align-items-start mt-1">
        <input class="form-check-input" type="radio" name="{{ $name }}" value="{{ $value }}" {{ ($active) ? 'checked="checked"':''}} />
    </span>
    <!--end::Radio button-->
    <span class="ms-5">
        <span class="fs-4 fw-bold mb-1 d-block">{{ $title }}</span>
        <span class="fw-semibold fs-7 text-gray-600">{{ $subtitle }}</span>
    </span>
</label>
