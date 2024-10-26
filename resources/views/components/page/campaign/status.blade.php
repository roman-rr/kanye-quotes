@props([
'campaign'
])

@if(empty($campaign->expires_at))
    @if(($campaign->active))
        <span class="badge badge-light-success me-auto">{{ __('In Progress') }}</span>
    @else
        <span class="badge badge-light-warning me-auto">{{ __('Inactive') }}</span>
    @endif
@else
    <span class="badge badge-light-danger me-auto">{{ __('Ended') }} {{ $campaign->expires_at->format("M j, Y") }}</span>
@endif
