@props([
'url',
'target',
'title',
])

<!--begin::Toolbar-->
<div class="card-toolbar">
    <!--begin::Menu-->
    <button class="btn btn-icon btn-color-gray-400 btn-active-color-primary justify-content-end" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-overflow="true">
        <!--begin::Svg Icon | path: icons/duotune/general/gen023.svg-->
        <span class="svg-icon svg-icon-1">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="4" fill="currentColor" />
                        <rect x="11" y="11" width="2.6" height="2.6" rx="1.3" fill="currentColor" />
                        <rect x="15" y="11" width="2.6" height="2.6" rx="1.3" fill="currentColor" />
                        <rect x="7" y="11" width="2.6" height="2.6" rx="1.3" fill="currentColor" />
                    </svg>
                </span>
        <!--end::Svg Icon-->
    </button>
    <!--begin::Menu 2-->
    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px" data-kt-menu="true">
        <!--begin::Menu item-->
        <div class="menu-item px-3">
            <div class="menu-content fs-6 text-dark fw-bold px-3 py-4">Quick Actions</div>
        </div>
        <!--end::Menu item-->
        <!--begin::Menu separator-->
        <div class="separator mb-3 opacity-75"></div>
        <!--end::Menu separator-->
        <!--begin::Menu item-->
        <div class="menu-item px-3">
            <a href="#" class="menu-link px-3">New Ticket</a>
        </div>
        <!--end::Menu item-->
        <!--begin::Menu item-->
        <div class="menu-item px-3">
            <a href="#" class="menu-link px-3">New Customer</a>
        </div>
        <!--end::Menu item-->
        <!--begin::Menu item-->
        <div class="menu-item px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="right-start">
            <!--begin::Menu item-->
            <a href="#" class="menu-link px-3">
                <span class="menu-title">New Group</span>
                <span class="menu-arrow"></span>
            </a>
            <!--end::Menu item-->
            <!--begin::Menu sub-->
            <div class="menu-sub menu-sub-dropdown w-175px py-4">
                <!--begin::Menu item-->
                <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3">Admin Group</a>
                </div>
                <!--end::Menu item-->
                <!--begin::Menu item-->
                <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3">Staff Group</a>
                </div>
                <!--end::Menu item-->
                <!--begin::Menu item-->
                <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3">Member Group</a>
                </div>
                <!--end::Menu item-->
            </div>
            <!--end::Menu sub-->
        </div>
        <!--end::Menu item-->
        <!--begin::Menu item-->
        <div class="menu-item px-3">
            <a href="#" class="menu-link px-3">New Contact</a>
        </div>
        <!--end::Menu item-->
        <!--begin::Menu separator-->
        <div class="separator mt-3 opacity-75"></div>
        <!--end::Menu separator-->
        <!--begin::Menu item-->
        <div class="menu-item px-3">
            <div class="menu-content px-3 py-3">
                <a class="btn btn-primary btn-sm px-4" href="#">Generate Reports</a>
            </div>
        </div>
        <!--end::Menu item-->
    </div>
    <!--end::Menu 2-->
    <!--end::Menu-->
</div>
<!--end::Toolbar-->
