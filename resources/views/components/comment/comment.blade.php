{{-- Using this template with JS interpolation --}}
<div class="comment {child_collapsed}" id="comment-{comment_id}" comment-id="{comment_id}">
    <div class="d-flex pt-6">
        <div class="symbol symbol-45px me-5">
            <img src="{profile_photo_path}" alt="" />
        </div>

        <div class="d-flex flex-column flex-row-fluid">
            <div class="d-flex align-items-center flex-wrap justify-content-between mb-0">
                <div>
                    <a href="{user_href}" class="text-gray-800 text-hover-primary fw-bold me-5">{first_name} {last_name}</a> 
                    <span class="badge badge-light-primary fw-bold px-2 py-2">{{ __('Staff') }}</span>
                </div>
                <div class="d-flex">
                    <div class="me-3 ms-auto text-primary fw-semibold fs-7 comment-loader d-none">
                        <span class="spinner-border spinner-border-sm"></span>
                    </div>
                    <div class="me-3 ms-auto cursor-pointer text-gray-400 text-hover-primary fw-semibold fs-7 {reply} button-reply">{{ __('Reply') }}</div>
                    <div class="ms-auto text-danger cursor-pointer text-hover-primary fw-semibold fs-7 {remove}" comment-id="{comment_id}">{{ __('Remove') }}</div>
                </div>
            </div>
            <div class="d-block text-gray-400 fw-semibold fs-7 me-5">{comment_date}</div>

            <span class="text-gray-800 fs-7 fw-normal pt-1">{comment_text}</span>
        </div>
    </div>
</div>