@props([
	'id' => '',
    'comment',
    'action',
    'reply' => false,
    'start' => true,
    'mini' => false
])

<!--begin::Comment(out)-->
<div class="d-flex {{ ($start) ? 'justify-content-start':'justify-content-end mb-10' }}">
    <!--begin::Wrapper-->
    <div class="d-flex flex-column {{ ($start) ? 'align-items-start':'align-items-end' }}">
        <!--begin::User-->
        <div class="d-flex flex-stack text-dark align-items-center mb-4">
            @if($start)
                <x-basic.timeline.components.avatar
                    :user="$comment->user"
                    mini="{{ $mini }}"
                />
                <x-basic.timeline.components.avatar-details
                    :action="$action"
                    :event="$comment"
                    :user="$comment->user"
                    start="{{ $start }}"
                    id="{{ $id }}"
                    minimal="{{ true }}"
                    mini="{{ $mini }}"
                />
            @else
                <x-basic.timeline.components.avatar-details
                    :action="$action"
                    :event="$comment"
                    :user="$comment->user"
                    start="{{ $start }}"
                    id="{{ $id }}"
                    minimal="{{ true }}"
                    mini="{{ $mini }}"
                />
                <x-basic.timeline.components.avatar
                    :user="$comment->user"
                    mini="{{ $mini }}"
                />
            @endif
        </div>
        <!--end::User-->
        <x-basic.timeline.components.text-bubble
            start="{{ $start }}"
            text="{{ $comment->comment }}"
        />
    </div>
    <!--end::Wrapper-->
</div>
<!--end::Comment(out)-->
