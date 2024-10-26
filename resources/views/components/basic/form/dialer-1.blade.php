@props([
    'placeholder',
    'name',
    'value',
    'readonly' => true,
    'dialer' => [
	    'data-kt-dialer' => 'true',
	    'data-kt-dialer-min' => '10',
	    'data-kt-dialer-max' => '10000',
	    'data-kt-dialer-step' => '10',
	    'data-kt-dialer-prefix' => '$',
	    'data-kt-dialer-decimals' => '2'
    ]
])

<!--begin::Dialer-->
<div class="position-relative w-md-300px"  {{ urldecode(http_build_query($dialer,'"',' ')) }}>
    <!--begin::Decrease control-->
    <button type="button" class="btn btn-icon btn-active-color-gray-700 position-absolute translate-middle-y top-50 start-0" data-kt-dialer-control="decrease">
        <x-icon name="general/gen036.svg" class="svg-icon-1"/>
    </button>
    <!--end::Decrease control-->
    <!--begin::Input control-->
    <input type="text" class="form-control form-control-solid border-0 ps-12" data-kt-dialer-control="input" placeholder="{{ $placeholder  }}" name="{{ $name }}" {{ ($readonly) ? 'readonly="readonly"':'' }} value="{{ $value }}" />
    <!--end::Input control-->
    <!--begin::Increase control-->
    <button type="button" class="btn btn-icon btn-active-color-gray-700 position-absolute translate-middle-y top-50 end-0" data-kt-dialer-control="increase">
        <x-icon name="general/gen035.svg" class="svg-icon-1"/>
    </button>
    <!--end::Increase control-->
</div>
<!--end::Dialer-->
