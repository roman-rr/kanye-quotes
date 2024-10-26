<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Services\QuotesService;
use Illuminate\Support\Facades\Log;

class QuoteDisplay extends Component
{
    public $quote;
    public $columnSize;
    public $quoteKey;

    protected $listeners = ['setQuote'];
    protected $quotesService;

    public function boot(QuotesService $quotesService)
    {
        $this->quotesService = $quotesService;
    }

    public function mount($columnSize = 8, $quote = '', $key = '')
    {
        $this->columnSize = $columnSize;
        $this->quote = $quote ?: $this->quotesService->getRandomKanyeQuote();
        $this->quoteKey = $key;
    }

    public function setQuote($quote, $key)
    {
        if ($key === $this->quoteKey) {
            Log::info("QuoteDisplay {$this->quoteKey} received new quote: {$quote}");
            $this->quote = $quote;
        }
    }

    public function refreshQuote()
    {
        $this->quote = $this->quotesService->getRandomKanyeQuote();
        Log::info("QuoteDisplay {$this->quoteKey} refreshed quote: {$this->quote}");
    }

    public function render()
    {
        return view('livewire.quote-display');
    }
}
