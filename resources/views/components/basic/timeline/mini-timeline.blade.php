<style>
    #activity-log .timeline-label:before {
        left: 60.5px;
    }
</style>

<div class="card card-flush mb-10" id="activity-log">
    <div class="card-header pt-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bold text-dark">{{ __('Timeline') }}</span>
            <span class="text-gray-400 pt-2 fw-semibold fs-6">{{ __('Latest activities') }}</span>
        </h3>
    </div>
    <div class="card-body">
        @php $events = \App\Enums\ActivityLogEvents::class; @endphp
        @foreach($actions as $action_key => $action_value)
            <x-basic.timeline.full-timeline :events="$events" :actions="$action_value" id="{{ $action_key }}" mini="{{ true }}" />
        @endforeach
    </div>
</div>
