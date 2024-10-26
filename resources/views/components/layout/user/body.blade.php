<!--begin::Container-->
<div class="d-flex flex-column flex-column-fluid">
    <!--begin::Toolbar-->
    <div class="app-toolbar py-3 py-lg-6">
        <!--begin::Toolbar container-->
        <div class="app-container container-xxl d-flex flex-stack">
            <!--begin::Page title-->
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                @if (Breadcrumbs::exists())
                    {{ Breadcrumbs::render() }}
                @endif
            </div>
            <!--end::Page title-->
        </div>
        <!--end::Toolbar container-->
    </div>
    <!--end::Toolbar-->
    <!--begin::Content-->
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-xxl">
            {{ $slot }}
        </div>
    </div>
</div>
<!--end::Container-->
