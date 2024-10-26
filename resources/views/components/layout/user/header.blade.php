@props([
'nav'
])

<!--begin::Header-->
<div id="kt_app_header" class="app-header">
    <!--begin::Header container-->
    <div class="app-container container-xxl d-flex align-items-stretch justify-content-between" id="kt_app_header_container">
        <!--begin::Logo-->
        <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0 me-lg-15">
            <a href="/">
                <img alt="Logo" src="assets/media/logos/default-dark.png" class="h-20px h-lg-25px app-sidebar-logo" />
                <img alt="Logo" src="assets/media/logos/default-small.png" class="h-20px app-sidebar-logo-mobile">
            </a>
        </div>
        <!--end::Logo-->
        <!--begin::Header wrapper-->
        <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1" id="kt_app_header_wrapper">
           <x-layout.user.element.top-menu :nav="$nav"/>
            <!--begin::Navbar-->
            <div class="app-navbar flex-shrink-0">
                <x-layout.user.element.theme-mode />
                <x-layout.user.element.user />
                <x-layout.user.element.menu />
            </div>
            <!--end::Navbar-->
        </div>
        <!--end::Header wrapper-->
    </div>
    <!--end::Header container-->
</div>
<!--end::Header-->
