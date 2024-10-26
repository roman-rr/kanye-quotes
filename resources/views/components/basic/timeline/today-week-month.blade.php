@props([
	'actions'
])

<x-basic.card.card>
    <x-basic.card.header>
        <!--begin::Title-->
        <div class="card-title d-flex align-items-center my-10 my-xl-0">
            <h3 class="fw-bold m-0 text-gray-800">{{ \Carbon\Carbon::now()->format('M d, Y') }}</h3>
        </div>
        <!--end::Title-->
        <!--begin::Toolbar-->
        <div class="card-toolbar m-0 mb-10 mt-xl-10">
            <!--begin::Tab nav-->
            <ul class="nav nav-tabs nav-line-tabs nav-stretch fs-5 border-0 fw-semibold" role="tablist">
                @foreach($actions as $action_key => $action_value)
                    <li class="nav-item mb-3" role="presentation">
                        <a id="activity_{{ $action_key }}_tab" class="btn btn-sm {{ ($action_value->isEmpty()) ? 'btn-light-danger':'btn-light-primary' }} {{ (!$loop->last) ? 'me-3':'' }} {{ ($loop->first) ? 'active':'' }}" data-bs-toggle="tab" role="tab" href="#activity_{{ $action_key }}">
                            <x-icon name="abstract/abs015.svg" class="svg-icon-2" />{{ __(ucfirst($action_key)) }}
                        </a>
                    </li>
                @endforeach
            </ul>
            <!--end::Tab nav-->
        </div>
        <!--end::Toolbar-->
    </x-basic.card.header>
    <x-basic.card.body>
        <!--begin::Tab Content-->
        <div class="tab-content">
            @foreach($actions as $action_key => $action_value)
                <!--begin::Tab panel-->
                <div id="activity_{{ $action_key }}" class="card-body p-0 tab-pane fade show {{ ($loop->first) ? 'active':'' }}" role="tabpanel" aria-labelledby="activity_{{ $action_key }}_tab">
                    <x-basic.timeline.full-timeline :actions="$action_value" id="{{ $action_key }}" />
                </div>
                <!--end::Tab panel-->
            @endforeach
        </div>
        <!--end::Tab Content-->
    </x-basic.card.body>
</x-basic.card.card>
