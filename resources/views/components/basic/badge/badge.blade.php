@props([
'title',
'light' => true,
'style' => 'primary',
'class' => 'me-1'
])

<span class="badge badge{{ ($light) ? '-light':'' }}-{{ $style }} {{ $class }}">{{ __($title) }}</span>
