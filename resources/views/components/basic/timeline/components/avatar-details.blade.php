@props([
	'action',
    'user',
    'event' => '',
    'start' => true,
    'mini' => false,
    'minimal' => false
])

@php
    $title = \App\Utils\ActivityLogUtils::actionTitle($action);
	$detail = \App\Utils\ActivityLogUtils::actionDetail($action, $mini);
@endphp

<!--begin::Info-->
<div class="d-flex flex-column {{ ($start) ? 'text-start ms-4':'text-end me-4' }}">
    @if($minimal)
        <a href="{{ route('users.show', ['id' => $user->id]) }}" class="{{ ($mini) ? 'fs-7':'fs-5' }} fw-bold text-gray-900 text-hover-primary">{{ $user->contact->full_name() }}</a>
        <span class="text-muted fs-7 mb-1 mt-1">{{ (!empty($event)) ? $event->created_at->diffForHumans():((!empty($detail)) ? $detail:'') }}</span>
    @else
        <div class="{{ ($mini) ? 'fs-6 fw-normal':'fs-5 fw-semibold text-dark mt-1' }}">
            {!! $title !!}
            <span class="text-muted fs-7 mb-1 mt-1 d-block">{{ (!empty($event)) ? $event->created_at->diffForHumans():((!empty($detail)) ? $detail:'') }}</span>
        </div>
    @endif
</div>
<!--end::Info-->
