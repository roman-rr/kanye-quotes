<!--begin::Comment reply form-->
<div {{ $attributes->merge(['class' => 'd-flex align-items-center reply-form']) }}>
    <!--Author-->
    <div class="symbol symbol-45px me-3">
        <img src="{{ Auth::user()->profile_photo_path }}" alt="" />
    </div>

    <!--Input group-->
    <div class="position-relative w-100">
        <textarea type="text" class="form-control form-control-solid border ps-5" rows="1" name="search" value="" data-kt-autosize="true" placeholder="Write your comment.."></textarea>

        <div class="position-absolute top-0 end-0 translate-middle-x mt-1 ">
            <button class="btn-send-loader btn btn-icon btn-sm btn-active-color-primary-500 btn-color-primary w-25px p-0 d-none">
                <span class="spinner-border text-primary spinner-border-sm"></span>
            </button>

            <button disabled class="btn-send btn btn-icon btn-sm btn-active-color-primary-500 btn-color-primary w-25px p-0">
                <i class="fonticon-send"></i>
            </button>
          
        </div>
    </div>
</div>
