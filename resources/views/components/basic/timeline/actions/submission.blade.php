@props([
	'id',
    'action',
    'loop',
    'mini' => false
])

<x-basic.timeline.components.base
    :action="$action"
    :user="$action->causer"
    id="{{ $id }}"
    :loop="$loop"
    mini="{{ $mini }}"
    :icon="['name' => 'arrows/arr024.svg', 'class' => 'svg-icon-primary']" >
        <x-basic.timeline.components.accordion-item
            :action="$action"
            :loop="$loop"
            id="{{ $id }}"
            mini="{{ $mini }}">

            @php
                // TODO: Move to ActivityLogUtils.php
                $campaignSubmission = \App\Models\CampaignSubmission::find($action->getExtraProperty('campaign_submission_id'));
            @endphp

            <x-basic.timeline.components.submission
                :submission="$campaignSubmission"
                :user="$action->causer"
                :action="$action"
                id="{{ $id }}"
                mini="{{ $mini }}"
            />
        </x-basic.timeline.components.accordion-item>
        @if($mini && !$loop->last)<div class='separator separator-dashed mb-6 mt-4'></div>@endif
</x-basic.timeline.components.base>
@once
    @push('vendor_scripts')
        <script src="assets/plugins/custom/fslightbox/fslightbox.bundle.js"></script>
    @endpush
@endonce