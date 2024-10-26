@props([
	'action',
    'user',
	'id' => '',
    'loop',
    'mini' => false
])

<!--begin::Title-->
<div class="d-flex justify-content-start">
    <!--begin::Wrapper-->
    <div class="d-flex flex-column align-items-start">
        <!--begin::User-->
        <div class="d-flex {{ ($mini) ? '':'flex-stack align-items-center mb-4' }}">
            <x-basic.timeline.components.avatar
                :user="$user"
                mini="{{ $mini }}"
            />
            <x-basic.timeline.components.avatar-details
                :action="$action"
                :user="$user"
                id="{{ $id }}"
                :loop="$loop"
                mini="{{ $mini }}"
            />
        </div>
        <!--end::User-->
    </div>
    <!--end::Wrapper-->
</div>
<!--end::Title-->
