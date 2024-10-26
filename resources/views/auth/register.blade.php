<x-side-layout>
    <div class="card rounded-3 w-lg-750px w-md-550px">
        <div class="card-body p-10 p-lg-10">
            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif
            <!--begin::Form-->
            {{--<form class="form w-100" novalidate="novalidate" id="kt_sign_up_form" data-kt-redirect-url="../../demo14/dist/authentication/layouts/creative/sign-in.html" action="#">--}}
            <form method="POST" id="kt_sign_up_form" data-kt-redirect-url="dashboard" action="{{ route('register') }}">
                @csrf
                <!--begin::Heading-->
                <div class="text-center mb-11">
                    <!--begin::Title-->
                    <h1 class="text-dark fw-bolder mb-3">{{ __('Sign Up') }}</h1>
                    <!--end::Title-->
                    <!--begin::Subtitle-->
                    <div class="text-gray-500 fw-semibold fs-6">{{ __('Kanye Quotes') }}</div>
                    <!--end::Subtitle=-->
                </div>
                <!--begin::Heading-->
                <!--begin::Login options-->
                <div class="row g-3 mb-9">
                    <!--begin::Col-->
                    <div class="col-md-6">
                        <x-basic.signin.google />
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-md-6">
                        <x-basic.signin.apple />
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Login options-->
                <!--begin::Separator-->
                <div class="separator separator-content my-14">
                    <span class="w-125px text-gray-500 fw-semibold fs-7">{{ __('Or with email') }}</span>
                </div>
                <!--end::Separator-->

                <x-basic.form.validation-error />

                <!--begin::Input group=-->
                <div class="fv-row mb-8">
                    <input class="form-control form-control-solid" placeholder="{{ __('Username') }}" id="username" type="text" name="username" :value="old('username')" required autocomplete="username" />
                </div>
                <!--end::Input group=-->

                {{-- Input --}}
                <div class="fv-row mb-8">
                    <input class="form-control form-control-solid" placeholder="{{ __('First Name') }}" id="first_name" type="text" name="first_name" :value="old('first_name')" required autocomplete="first_name" />
                </div>

                <!--begin::Input group=-->
                <div class="fv-row mb-8">
                    <input class="form-control form-control-solid" placeholder="{{ __('Email') }}" id="email" type="email" name="email" :value="old('email')" required autocomplete="email" />
                </div>
                <!--end::Input group=-->

                <div class="fv-row mb-8" data-kt-password-meter="true">
                    <!--begin::Wrapper-->
                    <div class="mb-1">
                        <!--begin::Input wrapper-->
                        <div class="position-relative mb-3">
                            <input class="form-control form-control-solid" type="password" placeholder="{{ __('Password') }}" name="password" autocomplete="new-password" />
                            <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
                                <i class="bi bi-eye-slash fs-2"></i>
                                <i class="bi bi-eye fs-2 d-none"></i>
                            </span>
                        </div>
                        <!--end::Input wrapper-->
                        <!--begin::Meter-->
                        <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                        </div>
                        <!--end::Meter-->
                    </div>
                    <!--end::Wrapper-->
                    <!--begin::Hint-->
                    <div class="text-muted">{{ __('Use 8 or more characters with a mix of letters, numbers & symbols.') }}</div>
                    <!--end::Hint-->
                </div>
                <!--end::Input group=-->

                <!--begin::Input group=-->
                <div class="fv-row mb-8">
                    <input class="form-control form-control-solid" placeholder="{{ __('Repeat Password') }}" id="password_confirmation" type="password" name="password_confirmation" required  autocomplete="new-password" />
                </div>
                <!--end::Input group=-->

                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                    <!--begin::Accept-->
                    <div class="fv-row mb-8">
                        <label class="form-check form-check-inline">
                            <input type="checkbox" name="terms" id="terms" class="form-check-input" />
                            <span class="form-check-label fw-semibold text-gray-700 fs-base ms-1">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </span>
                        </label>
                    </div>
                    <!--end::Accept-->
                @endif

           
                <!--begin::Submit button-->
                <div class="d-grid mb-10">
                    <button class="btn btn-primary" type="submit" id="kt_sign_in_submit">
                        <!--begin::Indicator label-->
                        <span class="indicator-label">{{ __('Sign Up') }}</span>
                        <!--end::Indicator label-->
                        <!--begin::Indicator progress-->
                        <span class="indicator-progress">{{ __('Please wait...') }}
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                        </span>
                        <!--end::Indicator progress-->
                    </button>
                </div>
                <!--end::Submit button-->
                <!--begin::Sign up-->
                <div class="text-gray-500 text-center fw-semibold fs-6">{{ __('Already have an Account?') }}
                    <a class="link-primary" href="{{ route('login') }}">{{ __('Sign In') }}</a>
                </div>
                <!--end::Sign up-->
            </form>
            <!--end::Form-->
            @push('scripts')
                <script src="assets/js/custom/authentication/sign-up/general.js"></script>
            @endpush
        </div>
    </div>
</x-side-layout>

