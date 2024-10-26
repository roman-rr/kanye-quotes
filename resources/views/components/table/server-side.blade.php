@props([
	'title' => '',
	'subtitle' => '',
	'data'
])

<x-basic.card.content>
    @if ($title && $subtitle)
        <x-basic.toolbar.toolbar-2 title="{{ $title }}" subtitle="{{ $subtitle }}"/>
    @endif

    <x-basic.card.flush class="mb-9">
        <x-basic.card.body>
            <x-basic.table.server-side :data="$data"/>
        </x-basic.card.body>
    </x-basic.card.flush>
</x-basic.card.content>
