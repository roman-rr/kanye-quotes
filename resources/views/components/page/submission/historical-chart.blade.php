<!--begin::Chart-->
<x-basic.card.flush class="mb-9">
    <x-basic.header.header-1 title="{{ __('Historical New Submission Chart') }}" subtitle="{{ $count }} {{ __('total submissions') }}">
        <!--begin::Toolbar-->
        <div class="card-toolbar" data-kt-buttons="true" role="tablist">
            <a class="btn btn-sm btn-color-muted btn-active btn-active-primary active px-4 me-1" data-bs-toggle="tab" id="tab_week" href="#tab_content_week" aria-selected="false" role="tab">{{ __('Week') }}</a>
            <a class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4 me-1" data-bs-toggle="tab" id="tab_month" href="#tab_content_month" aria-selected="false" tabindex="-1" role="tab">{{ __('Month') }}</a>
            <a class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4" data-bs-toggle="tab" id="tab_year" href="#tab_content_year" aria-selected="false" tabindex="-1" role="tab">{{ __('Year') }}</a>
        </div>
        <!--end::Toolbar-->
    </x-basic.header.header-1>
    <!--begin::Body-->
    <div class="card-body ps-3 pe-5 py-2">
        <div class="tab-content">
            <div class="tab-pane fade active show" id="tab_content_week" role="tabpanel" aria-labelledby="#tab_week">
                <x-submissions-line-chart day="7" />
            </div>
            <div class="tab-pane fade" id="tab_content_month" role="tabpanel" aria-labelledby="#tab_month">
                <x-submissions-line-chart day="30" />
            </div>
            <div class="tab-pane fade" id="tab_content_year" role="tabpanel" aria-labelledby="#tab_year">
                <x-submissions-line-chart month="12" />
            </div>
        </div>
    </div>
    <!--end::Body-->
</x-basic.card.flush>
<!--end::Chart-->
