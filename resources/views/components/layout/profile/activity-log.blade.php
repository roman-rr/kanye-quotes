@props([
	'table' => [],
])

<x-table.server-side title="{{ __($table['title']) }}" subtitle="{{ $table['subtitle'] }}" :data="$table['data']" />
