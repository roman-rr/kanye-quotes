@props([
    'user',
    'mini' => false
])

<!--begin::User-->
<a href="{{ route('users.show', ['id' => $user->id]) }}">
    <div class="symbol {{ ($mini) ? 'symbol-xl-40px mt-2':'symbol-xl-55px' }} symbol-75px" data-bs-toggle="tooltip" data-bs-boundary="window" data-bs-placement="top" title="{{ $user->contact->full_name() }}">
        <img src="{{ $user->profile_photo_path }}" alt="{{ $user->contact->full_name() }}" />
    </div>
</a>
<!--end::User-->
