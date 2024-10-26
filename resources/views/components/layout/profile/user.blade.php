@props([
    'user'
])

<x-basic.card.card class="mb-5 mb-xl-8">
    <x-basic.card.body class="pt-15">
        <!--begin::Summary-->
        <div class="d-flex flex-center flex-column mb-5">
            <x-basic.avatar.square src="{{ $user->profile_photo_path }}" alt="{{ $user->contact->full_name() }}" />
            <!--begin::Name-->
            <a href="#" class="fs-3 text-gray-800 text-hover-primary fw-bold mb-1">{{ $user->contact->full_name() }}</a>
            <!--end::Name-->
            @if($user->designer)
                <!--begin::Position-->
                <div class="fs-5 fw-semibold text-muted mb-6">{{ __('Designer') }}</div>
                <!--end::Position-->
            @endif
        </div>
        <!--end::Summary-->
        <!--begin::Details toggle-->
        <div class="d-flex flex-stack fs-4 py-3">
            <div class="fw-bold rotate collapsible" data-bs-toggle="collapse" href="#customer_view_details" role="button" aria-expanded="false" aria-controls="customer_view_details">
                {{ __('Details') }}
                <span class="ms-2 mt-1 rotate-180">
                    <x-icon name="arrows/arr072.svg" class="svg-icon-3" />
                </span>
            </div>
            <span data-bs-toggle="tooltip" data-bs-trigger="hover" title="{{ __('Edit customer details') }}">
                <a href="#" class="btn btn-sm btn-light-primary" data-bs-toggle="modal" data-bs-target="#modal_update_customer">{{ __('Edit') }}</a>
            </span>
        </div>
        <!--end::Details toggle-->
        <div class="separator separator-dashed my-3"></div>
        <!--begin::Details content-->
        <div id="customer_view_details" class="collapse show">
            <div class="py-5 fs-6">
                @if($user->designer)
                    <!--begin::Badge-->
                    <div class="badge badge-light-info d-inline">{{ $user->designer->designer_level->level }}</div>
                    <!--begin::Badge-->
                @endif
                <!--begin::Details item-->
                <div class="fw-bold mt-5">{{ __('Email') }}</div>
                <div class="text-gray-600">
                    <a href="#" class="text-gray-600 text-hover-primary">{{ $user->email }}</a>
                </div>
                <!--begin::Details item-->
                <!--begin::Details item-->
                <div class="fw-bold mt-5">{{ __('Billing Address') }}</div>
                <div class="text-gray-600">{{ $user->address->street }}
                    <br />{{ $user->address->city }}, {{ $user->address->state }} {{ $user->address->post_code }}<br>{{ $user->address->country }}</div>
                <!--begin::Details item-->
            </div>
        </div>
        <!--end::Details content-->
    </x-basic.card.body>
</x-basic.card.card>
<x-modals.edit-user :user="$user" />
