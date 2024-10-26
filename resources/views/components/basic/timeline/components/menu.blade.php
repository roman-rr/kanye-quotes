@props([
'title' => 'Quick Actions',
'items' => []
])

<!--begin::Menu-->
<div class="mt-n4">
    <button type="button" class="btn btn-sm btn-icon btn-color-primary btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
        <x-icon name="general/gen024.svg" class="svg-icon-1" />
    </button>
    <!--begin::Menu 2-->
    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-250px pb-4" data-kt-menu="true">
        <!--begin::Menu item-->
        <div class="menu-item px-3">
            <div class="menu-content fs-6 text-dark fw-bold px-3 py-4">{{ __($title) }}</div>
        </div>
        <!--end::Menu item-->
        <!--begin::Menu separator-->
        <div class="separator mb-3 opacity-75"></div>
        <!--end::Menu separator-->
        @foreach($items as $item)
            <!--begin::Menu item-->
            <div class="menu-item px-3">
                <a href="{{ $item['url'] }}" class="menu-link px-3">{{ __($item['title']) }}</a>
            </div>
            <!--end::Menu item-->
        @endforeach
    </div>
    <!--end::Menu 2-->
</div>
<!--end::Menu-->
