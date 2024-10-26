@props([
	'table' => [],
    'metrics' => []
])

<!--begin::Earnings-->
<x-basic.card.card class="mb-6 mb-xl-9">
    <!--begin::Header-->
    <div class="card-header border-0">
        <div class="card-title">
            <h2>{{ __('Earnings') }}</h2>
        </div>
    </div>
    <!--end::Header-->
    <x-basic.card.body class="py-0">
        <div class="fs-5 fw-semibold text-gray-500 mb-4">Last 30 day earnings calculated. Apart from arranging the order of topics.</div>
        @if(!empty($metrics))
            <!--begin::Left Section-->
            <div class="d-flex flex-wrap flex-stack mb-5">
                <!--begin::Row-->
                <div class="d-flex flex-wrap">
                    @foreach ($metrics as $metric)
                        <x-basic.misc.stat-2 title="0" sub_title="{{ __($metric['title']) }}" countup="{{ true }}" countup_value="{{ $metric['value'] }}" countup_prefix="{{ $metric['prefix'] }}" svg="{{ $metric['svg'] }}" svg_class="svg-icon-1 svg-icon-{{ $metric['svg_class'] }}" />
                    @endforeach
                </div>
                <!--end::Row-->
            </div>
            <!--end::Left Section-->
        @endif
    </x-basic.card.body>
</x-basic.card.card>
<!--end::Earnings-->
<x-table.server-side title="{{ __($table['title']) }}" subtitle="({{ $table['subtitle'] }})" :data="$table['data']" />
