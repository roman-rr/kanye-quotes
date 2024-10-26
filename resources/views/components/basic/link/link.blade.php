@props([
'url' => '',
'target' => '_self',
'title',
'class' => 'text-dark text-hover-primary'
])

<a href="{{ $url }}"  target="{{ $target }}" class="{{ $class }}">{{ $title }}</a>
