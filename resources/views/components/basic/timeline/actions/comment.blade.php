@props([
    'action',
	'id',
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
            $comment = \App\Models\Comment::find($action->getExtraProperty('comment_id')); 
            $parentComment = App\Models\Comment::find($comment->comment_id);
        @endphp
        @if($parentComment)
            <x-basic.timeline.components.comment
                :action="$action"
                :comment="$parentComment"
                start="{{ false }}"
                id="{{ $id }}"
                mini="{{ $mini }}"
            />
        @endif
        <x-basic.timeline.components.comment
            :action="$action"
            :comment="$comment"
            id="{{ $id }}"
            mini="{{ $mini }}"
        />
    </x-basic.timeline.components.accordion-item>
    @if($mini && !$loop->last)<div class='separator separator-dashed mb-6 mt-4'></div>@endif
</x-basic.timeline.components.base>
