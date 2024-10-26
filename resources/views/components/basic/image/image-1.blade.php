@props([
'url',
'target',
'source',
'alt'
])

<!--begin::Img-->
{!! (!empty($url)) ? '<a href="'.$url.'" target="'.((!empty($target)) ? $target:'_self').'">':'' !!}
    <img src="{{ $source }}" class="rounded w-100" alt="{{ $alt }}" />
{!! (!empty($url)) ? '</a>':'' !!}
<!--end::Img-->
