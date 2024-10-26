@props([
'title'
])

<x-basic.grid.row class="mb-8">
    <x-basic.grid.column class="col-xl-3">
        <div class="fs-6 fw-semibold mt-2 mb-3">{{ $title }}</div>
    </x-basic.grid.column>
    <x-basic.grid.column class="col-xl-9">
            {{ $slot }}
    </x-basic.grid.column>
</x-basic.grid.row>
