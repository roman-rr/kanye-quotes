@props([
'drawer' => 'true',
'drawer_name' => 'start-sidebar',
'drawer_activate' => '{default: true, lg: false}',
'drawer_overlay' => 'true',
'drawer_width' => '{default:\'200px\', \'250px\': \'300px\'}',
'drawer_direction' => 'start',
'drawer_toggle' => 'campaign_start_sidebar_toggle'
])

<!--begin::Sidebar-->
<div {{ $attributes->merge(['class' => 'd-lg-flex flex-column flex-lg-row-auto w-lg-325px'	]) }}
     data-kt-drawer="{{ $drawer }}"
     data-kt-drawer-name="{{ $drawer_name }}"
     data-kt-drawer-activate="{{ $drawer_activate }}"
     data-kt-drawer-overlay="{{ $drawer_overlay }}"
     data-kt-drawer-width="{{ $drawer_width }}"
     data-kt-drawer-direction="{{ $drawer_direction }}"
     data-kt-drawer-toggle="#{{ $drawer_toggle }}">

    {{ $slot }}
</div>
<!--end::Sidebar-->
