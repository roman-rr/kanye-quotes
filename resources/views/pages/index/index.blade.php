<x-user-layout>
	<div class="row mt-2 mb-10">
		<div class="col-12 text-center">
			@livewire('global-countdown')
		</div>
	</div>

	<div>
		<div class="row g-5 g-lg-10">
			@livewire('quote-display', ['columnSize' => 8, 'quote' => $initialQuotes[0], 'key' => 'quote-1'])
				@livewire('quote-display', ['columnSize' => 4, 'quote' => $initialQuotes[1], 'key' => 'quote-2'])
		</div>

		<div class="row g-5 g-lg-10 mt-1">
			@livewire('quote-display', ['columnSize' => 3, 'quote' => $initialQuotes[2], 'key' => 'quote-3'])
					@livewire('quote-display', ['columnSize' => 9, 'quote' => $initialQuotes[3], 'key' => 'quote-4'])
		</div>

		<div class="row g-5 g-lg-10 mt-1">
			@livewire('quote-display', ['columnSize' => 9, 'quote' => $initialQuotes[4], 'key' => 'quote-5'])
					@livewire('quote-display', ['columnSize' => 3, 'quote' => $initialQuotes[5], 'key' => 'quote-6'])
		</div>

		<div class="row g-5 g-lg-10 mt-1">
			@livewire('quote-display', ['columnSize' => 6, 'quote' => $initialQuotes[6], 'key' => 'quote-7'])
					@livewire('quote-display', ['columnSize' => 6, 'quote' => $initialQuotes[7], 'key' => 'quote-8'])
		</div>
	</div>


@push('custom_scripts')
<script>
    window.addEventListener('load', function () {
        if (typeof Livewire !== 'undefined') {
            Livewire.on('quotesUpdated', quotes => {
                quotes.forEach((quote, index) => {
                    Livewire.emit('setQuote', quote, `quote-${index + 1}`);
                });
            });
        } else {
            console.error('Livewire is not defined');
        }
    });
</script>
@endpush


</x-user-layout>
