<x-side-layout>
    <div class="card rounded-3 w-550px w-md-550px">
        <div class="card-body p-10 p-lg-20">
            <x-basic.form.validation-error class="mb-4" />
            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif
            <!--begin::Form-->
            {{--<form class="form w-100" novalidate="novalidate" id="kt_sign_in_form" data-kt-redirect-url="../../demo14/dist/index.html" action="#">--}}
            <form class="form w-100" novalidate="novalidate" method="POST" action="{{ route('login') }}">
                @csrf
                <!--begin::Heading-->
                <div class="text-center mb-11">
                    <!--begin::Title-->
                    <h1 class="text-dark fw-bolder mb-3">{{ __('Sign In') }}</h1>
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

                <!--begin::Input group=-->
                <div class="fv-row mb-8">
                    <input class="form-control form-control-solid" placeholder="{{ __('Username') }}" id="username" type="text" name="username" value="demo" required /> {{-- :value="old('username')"--}}
                </div>
                <!--end::Input group=-->

                <!--begin::Input group=-->
                <div class="fv-row mb-8">
                    <input class="form-control form-control-solid" placeholder="{{ __('Password') }}" id="password" type="password" name="password" value="" required autocomplete="current-password" />
                </div>
                <!--end::Input group=-->

                <!--begin::Checkbox group=-->
                <div class="fv-row mb-8">
                    <label class="form-check form-check-inline">
                        <input type="checkbox" id="remember_me" name="remember" class="form-check-input" />
                        <span class="form-check-label fw-semibold text-gray-700 fs-base ms-1">
                            {{ __('Remember me') }}
                        </span>
                    </label>
                </div>
                <!--end::Checkbox group=-->

                <!--begin::Submit button-->
                <div class="d-grid mb-10">
                    <button class="btn btn-primary" type="submit" id="kt_sign_in_submit">
                        <!--begin::Indicator label-->
                        <span class="indicator-label">{{ __('Sign In') }}</span>
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
                <div class="text-gray-500 text-center fw-semibold fs-6">{{ __('Not a Member yet?') }}
                    <a class="link-primary" href="{{ route('register') }}">{{ __('Sign Up') }}</a>
                    {{-- @if (Route::has('password.request'))
                        <!--begin::Forgot Password Link-->
                        | <a class="link-primary" href="{{ route('password.request') }}">
                            {{ __('Forgot password?') }}
                        </a>
                        <!--end::Forgot Password Link-->
                    @endif --}}
                </div>
                <!--end::Sign up-->
            </form>
            <!--end::Form-->
            @push('scripts')
                <script src="assets/js/custom/authentication/sign-in/general.js"></script>
            @endpush
        </div>
    </div>
</x-side-layout>
