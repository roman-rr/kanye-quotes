@props([
    'name'
])

<span {{ $attributes->merge(['class' => 'svg-icon svg-icon-1']) }}>
    <x-icon name="{{ $name }}" />
</span>
