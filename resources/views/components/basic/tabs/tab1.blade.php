@props([
	'title',
	'url',
    'active' => false,
    'count_up' => false
])

<!--begin:::Tab item-->
<li class="nav-item">
   @php
    $class = 'nav-link text-active-primary pb-4';
    if ($active) {
        $class .= ' active';
    }
   @endphp
    <a data-bs-toggle="tab" {{ $attributes->merge(['class' => $class ]) }} data-bs-toggle="tab" @if($count_up) data-kt-countup-tabs="true" @endif href="#{{ $url }}">{{ $title }}</a>
</li>
<!--end:::Tab item--> 
