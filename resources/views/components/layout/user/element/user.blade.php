@php
    $user = Auth::user();
	$contact = $user->contact;
@endphp

    <!--begin::User menu-->
<div class="app-navbar-item ms-1 ms-lg-3" id="kt_header_user_menu_toggle">
    <!--begin::Menu wrapper-->
    <div class="cursor-pointer symbol symbol-35px symbol-md-40px" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
        <img src="{{ $user->profile_photo_path }}" alt="{{ __('Avatar') }}" />
    </div>
    <!--begin::User account menu-->
    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px" data-kt-menu="true">
        <!--begin::Menu item-->
        <div class="menu-item px-3">
            <div class="menu-content d-flex align-items-center px-3">
                <!--begin::Avatar-->
                <div class="symbol symbol-50px me-5">
                    <img src="{{ $user->profile_photo_path }}" alt="{{ __('Avatar') }}" />
                </div>
                <!--end::Avatar-->
                <!--begin::Username-->
                <div class="d-flex flex-column">
                    <div class="fw-bold d-flex align-items-center fs-5">{{ Auth::user()->Username }}
                        @if (Auth::user()->designer)
                            <span class="badge badge-light-success fw-bold fs-8 px-2 py-1">{{ __('Designer') }}</span>
                        @endif
                        @if (Auth::user()->staff)
                            <span class="badge badge-light-danger fw-bold fs-8 px-2 py-1">{{ __('Staff') }}</span>
                        @endif
                    </div>
                    <a href="#" class="fw-semibold text-muted text-hover-primary fs-7">{{ Auth::user()->email }}</a>
                </div>
                <!--end::Username-->
            </div>
        </div>
        <!--end::Menu item-->
        <!--begin::Menu separator-->
        <div class="separator my-2"></div>

        <div class="menu-item px-5">
            <a href="#" class="menu-link px-5">My Profile</a>
        </div>
        

        <!--begin::Menu separator-->
        <div class="separator my-2"></div>

        <!--end::Menu separator-->
        <!--begin::Menu item-->
        <div class="menu-item px-5" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="left-start" data-kt-menu-offset="-15px, 0">
            <a href="#" class="menu-link px-5">
                <span class="menu-title position-relative">Language
                    <span class="fs-8 rounded bg-light px-3 py-2 position-absolute translate-middle-y top-50 end-0">English
                        <img class="w-15px h-15px rounded-1 ms-2" src="assets/media/flags/united-states.svg" alt="" />
                    </span>
                </span>
            </a>
            <!--begin::Menu sub-->
            <div class="menu-sub menu-sub-dropdown w-175px py-4">
                <!--begin::Menu item-->
                <div class="menu-item px-3">
                    <a href="#" class="menu-link d-flex px-5 active">
                        <span class="symbol symbol-20px me-4">
                            <img class="rounded-1" src="assets/media/flags/united-states.svg" alt="" />
                        </span>English
                    </a>
                </div>
            </div>
            <!--end::Menu sub-->
        </div>
        <!--end::Menu item-->
        <!--begin::Menu item-->
        <div class="menu-item px-5 my-1">
            <a href="#" class="menu-link px-5">Account Settings</a>
        </div>
        <!--end::Menu item-->
        <!--begin::Menu item-->
        <div class="menu-item px-5">
            <form method="POST" action="{{ route('logout') }}" id="loguout-form" x-data>
                @csrf
                <a  class="menu-link px-5" onclick="event.preventDefault();event.target.parentElement.submit();">
                    {{ __('Sign Out') }}
                </a>
            </form>
        </div>
        <!--end::Menu item-->
    </div>
    <!--end::User account menu-->
    <!--end::Menu wrapper-->
</div>
<!--end::User menu-->

<!--begin::User-->
<div class="d-flex align-items-center ms-1" id="kt_header_user_menu_toggle">

   <!--begin::User account menu-->
   <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px" data-kt-menu="true">

      {{-- Menu Item --}}
       <div class="menu-item px-5">
           <a href="#" :active="request()->routeIs('profile.show')" class="menu-link px-5">
               {{ __('My Profile') }}
           </a>
       </div>


     
      {{-- Separator --}}
       <div class="separator my-2"></div>
   </div>
</div>
