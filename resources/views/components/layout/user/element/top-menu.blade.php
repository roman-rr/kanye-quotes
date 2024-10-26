<!--begin::Menu wrapper-->
<div class="app-header-menu app-header-mobile-drawer align-items-stretch" data-kt-drawer="true" data-kt-drawer-name="app-header-menu" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="250px" data-kt-drawer-direction="end" data-kt-drawer-toggle="#kt_app_header_menu_toggle" data-kt-swapper="true" data-kt-swapper-mode="{default: 'append', lg: 'prepend'}" data-kt-swapper-parent="{default: '#kt_app_body', lg: '#kt_app_header_wrapper'}">
    
    {{-- Menu --}}
    <div class="menu menu-rounded menu-column menu-lg-row my-5 my-lg-0 align-items-stretch fw-semibold px-2 px-lg-0" id="kt_app_header_menu" data-kt-menu="true">
        {{-- Main app menus --}}
        @foreach($nav as $item)
            <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="bottom-start" class="menu-item menu-here-bg menu-lg-down-accordion me-0 me-lg-2 
                @if ((empty(request()->segment(2)) && $item['slug'] == 'dashboard')|| request()->segment(1) == $item['slug']) here @endif">
                {{-- Menu title --}}
                <span class="menu-link">
                    <span class="menu-title">{{ $item['title'] }}</span>
                    <span class="menu-arrow d-lg-none"></span>
                </span>
                
                {{-- Sub-Items --}}
                <div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown p-0 w-100 w-lg-{{ $item['wrapItems'] ? '350' : '850' }}px">
                    <div class="menu-state-bg menu-extended overflow-hidden" data-kt-menu-dismiss="true">
                        <div class="row">
                            <div class="col-lg-{{ $item['wrapItems'] ? '12' : '8' }} mb-3 mb-lg-0 py-3 px-3 py-lg-6 px-lg-6">
                                <div class="row">
                                    @foreach($item['sub'] as $sub)
                                        <div class="col-lg-{{ $item['wrapItems'] ? '12' : '6' }} mb-3">
                                            <div class="menu-item p-0 m-0">
                                                <a href="{{ $sub['url'] }}" target="{{ (isset($sub['target'])) ? $sub['target']:'_self' }}" class="menu-link {{ (request()->segment(1) == $sub['route']) ? 'active' : '' }}">
                                                    <span class="menu-custom-icon d-flex flex-center flex-shrink-0 rounded w-40px h-40px me-3">
                                                        <x-icon name="{{ $sub['svg'] }}" class="svg-icon-{{ (empty($sub['svg_class'])) ? 'primary':$sub['svg_class'] }} svg-icon-1"/>
                                                    </span>
                                                    <span class="d-flex flex-column">
                                                        <span class="fs-6 fw-bold text-gray-800">{{ $sub['title'] }}</span>
                                                        @if(!empty($sub['subtitle']))<span class="fs-7 fw-semibold text-muted">{{ $sub['subtitle'] }}</span>@endif
                                                    </span>
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            {{-- Side --}}
                            @if ($item['side'])
                                <div class="menu-more bg-light col-lg-4 py-3 px-3 py-lg-6 px-lg-6 rounded-end">
                                    <h4 class="fs-6 fs-lg-4 text-gray-800 fw-bold mt-3 mb-3 ms-4">{{ $item['side']['title'] }}</h4>
                                    @foreach($item['side']['sub'] as $item)
                                        <div class="menu-item p-0 m-0">
                                            <a href="{{ $item['url'] }}" target="{{ (isset($sub['target'])) ? $sub['target']:'_self' }}" class="menu-link py-2 {{ (request()->segment(1) == $sub['route']) ? 'active' : '' }}">
                                                <span class="menu-title">{{ $item['title'] }}</span>
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        {{-- Other links --}}
        {{-- <x-layout.user.element.top-menu-examples /> --}}
      
    </div>
</div>