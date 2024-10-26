@props([
'url',
'target',
'title',
])

<!--begin::Toolbar-->
<div class="card-toolbar">
    {!! (!empty($url)) ? '<a href="'.$url.'" target="'.((!empty($target)) ? $target:'_self').'" class="btn btn-sm btn-light">':'' !!}
    {{ $title }}
    {!! (!empty($url)) ? '</a>':'' !!}
</div>
<!--end::Toolbar-->
