@props([
	'src',
	'alt' => '',
	'url' => '',
    'target' => '_self',
])

<!--begin::Avatar-->
<div class="symbol symbol-125px mb-7">
    @if(! empty($url))
        <a href="{{ $url }}" target="{{ $target }}">
    @endif
    <img src="{{ $src }}" alt="{{ $alt }}" />
    @if(! empty($url))
        </a>
    @endif
</div>
<!--end::Avatar-->
