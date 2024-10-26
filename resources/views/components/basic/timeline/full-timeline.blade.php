@props([
	'actions',
	'id',
	'mini' => false
])

@if(!empty($actions->isEmpty()))
    @php $content['subtitle'] = __('Please check later timeframes for possible activity logs.'); @endphp
    @switch($id)
        @case('latest')
            @php $content['title'] = __('There has been no activity.'); @endphp
            @php $content['subtitle'] = __('There has been no activity.'); @endphp
            @break;
        @case('today')
            @php $content['title'] = __('There has been no activity today.'); @endphp
            @break;
        @case('yesterday')
            @php $content['title'] = __('There was no activity yesterday.'); @endphp
            @break;
        @default
            @php $content['title'] = __('There has been no activity over the last '.$id.'.'); @endphp
    @endswitch
    <x-basic.alert.advanced-alert
        :content="$content"
        :icon="['name' => 'general/gen044.svg', 'class' => 'svg-icon-5tx svg-icon-danger mb-5']"
        class="bg-light-danger"
    />
@endif
<!--begin::Timeline-->
<div class="timeline">
    <!--begin::Accordion-->
    <div class="accordion accordion-icon-toggle" id="accordion_{{ $id }}">
        @php $events = \App\Enums\ActivityLogEvents::class; @endphp
        @php $component_base = 'basic.timeline.actions.' @endphp
        @foreach($actions as $action)
            @switch($action->description)
                @case($events::CampaignPayment)
                @case($events::CampaignPaymentFailed)
                    @php $component = 'payment' @endphp
                    <x-dynamic-component
                        :component="$component_base.$component"
                        :action="$action"
                        :loop="$loop"
                        id="{{ $id }}"
                        mini="{{ $mini }}"
                    />
                    @break
                @case($events::CampaignSubmission)
                    @php $component = 'submission' @endphp
                    <x-dynamic-component
                        :component="$component_base.$component"
                        :action="$action"
                        :loop="$loop"
                        id="{{ $id }}"
                        mini="{{ $mini }}"
                    />
                    @break
                @case($events::CampaignComment)
                    @php $component = 'comment' @endphp
                    <x-dynamic-component
                        :component="$component_base.$component"
                        :action="$action"
                        :loop="$loop"
                        id="{{ $id }}"
                        mini="{{ $mini }}"
                    />
                    @break
            @endswitch

            @php $includes[$component] = '' @endphp
            @if(\Carbon\Carbon::parse($action->created_at)->isToday())

            @endif
        @endforeach
    </div>
    <!--end::Accordion-->
</div>
<!--end::Timeline-->
{{ $actions->links() }}
