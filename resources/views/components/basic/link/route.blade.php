@props([
    'route',
    'id' => '',
    'title' => ''
])

<a href="{{ route($route, $id) }}" class="text-dark text-hover-primary">{{ $title }}</a>
