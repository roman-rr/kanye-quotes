<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Services\QuotesService;
use Illuminate\Support\Facades\Log;

class GlobalCountdown extends Component
{
    public $countdown = 60;
    public $quotes = [];

    protected $listeners = ['refreshQuotes' => 'fetchQuotes'];

    public function mount()
    {
        $this->startCountdown();
        $this->fetchQuotes();
    }

    public function startCountdown()
    {
        $this->countdown = 60;
    }

    public function decrementCountdown()
    {
        $this->countdown--;
        if ($this->countdown <= 0) {
            $this->fetchQuotes();
            $this->startCountdown();
        }
    }

    public function fetchQuotes()
    {
        $quotesService = new QuotesService();
        $allQuotes = $quotesService->getMultipleKanyeQuotes(100000);
        $this->quotes = array_rand(array_flip($allQuotes), 8);
        $this->emit('quotesUpdated', $this->quotes);
    }

    public function render()
    {
        return view('livewire.global-countdown');
    }
}
