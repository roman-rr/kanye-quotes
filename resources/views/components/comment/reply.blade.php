<!--begin::Comment form-->
<div class="d-flex align-items-center">
    <!--begin::Author-->
    <div class="symbol symbol-35px me-3">
        <img src="{{ Auth::user()->profile_photo_path }}" alt="" />
    </div>
    <!--end::Author-->
    <!--begin::Input group-->
    <div class="position-relative w-100">
        <!--begin::Input-->
        <textarea type="text" class="form-control form-control-solid border ps-5" rows="1" name="search" value="" data-kt-autosize="true" placeholder="Write your comment.."></textarea>
        <!--end::Input-->
        <!--begin::Actions-->
        <div class="position-absolute top-0 end-0 translate-middle-x mt-1 me-n14">
            <!--begin::Btn-->
            <button class="btn btn-icon btn-sm btn-color-gray-500 btn-active-color-primary w-25px p-0">
                <i class="fonticon-attach fs-2"></i>
            </button>
            <!--end::Btn-->
            <!--begin::Btn-->
            <button class="btn btn-icon btn-sm btn-color-gray-500 btn-active-color-primary w-25px p-0">
                <i class="fonticon-smile fs-2"></i>
            </button>
            <!--end::Btn-->
            <!--begin::Btn-->
            <button class="btn btn-icon btn-sm btn-color-gray-500 btn-active-color-primary w-25px p-0">
                <i class="fonticon-gallery fs-2"></i>
            </button>
            <!--end::Btn-->
            <!--begin::Btn-->
            <button class="btn btn-icon btn-sm btn-color-gray-500 btn-active-color-primary w-25px p-0">
                <i class="fonticon-location fs-2"></i>
            </button>
            <!--end::Btn-->
        </div>
        <!--end::Actions-->
    </div>
    <!--end::Input group-->
</div>
<!--end::Comment form-->
