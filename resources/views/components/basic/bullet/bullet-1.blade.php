@props([
'title',
'item' => '',
'items' => []
])
@php if(!empty($item)){ $items[] = $item; } @endphp

<!--begin::Item-->
<div class="mb-8">
    <!--begin::Title-->
    <h4 class="text-gray-700 w-bolder mb-0">{{ $title }}</h4>
    <!--end::Title-->
    <!--begin::Section-->
    <div class="my-2">
        @foreach($items as $item)
            <!--begin::Row-->
            <div class="d-flex align-items-center mb-3">
                <!--begin::Bullet-->
                <span class="bullet me-3"></span>
                <!--end::Bullet-->
                <!--begin::Label-->
                <div class="text-gray-600 fw-semibold fs-6">{!! (!empty($item['url'])) ? '<a href="'.$item['url'].'" target="'.((!empty($item['target'])) ? $item['target']:'_self').'">':'' !!}{{ $item['title'] }}{!! (!empty($item['url'])) ? '</a>':'' !!}</div>
                <!--end::Label-->
            </div>
            <!--end::Row-->
        @endforeach
    </div>
    <!--end::Section-->
</div>
<!--end::Item-->
