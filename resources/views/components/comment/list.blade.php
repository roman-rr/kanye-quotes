@props([
'comments'
])

@foreach($comments as $comment)
    <x-comment.comment :comment="$comment" sub="{{ false }}" />
    @foreach($comment->comments as $subcomment)
        <x-comment.comment :comment="$subcomment" sub="{{ true }}" />
    @endforeach
@endforeach
