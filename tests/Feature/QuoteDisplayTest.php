<?php

namespace Tests\Feature;

use App\Http\Livewire\QuoteDisplay;
use App\Services\QuoteService;
use App\Services\QuotesService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Mockery;
use Tests\TestCase;

class QuoteDisplayTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function quote_display_component_can_render()
    {
        Livewire::test(QuoteDisplay::class)
            ->assertStatus(200);
    }

    /** @test */
    public function quote_display_component_can_refresh_quote()
    {
        $mockQuotesService = Mockery::mock(QuotesService::class);
        $mockQuotesService->shouldReceive('getRandomKanyeQuote')
            ->twice() // Once for initial load, once for refresh
            ->andReturn('Mocked Quote');

        $this->app->instance(QuotesService::class, $mockQuotesService);

        Livewire::test(QuoteDisplay::class)
            ->assertSet('quote', 'Mocked Quote') // Check initial quote
            ->call('refreshQuote')
            ->assertSet('quote', 'Mocked Quote') // Check refreshed quote
            ->assertNotSet('quote', '');
    }

    /** @test */
    public function quote_display_component_can_receive_new_quote()
    {
        $initialQuote = 'Initial quote';
        $newQuote = 'New quote';

        Livewire::test(QuoteDisplay::class, ['quote' => $initialQuote])
            ->assertSet('quote', $initialQuote)
            ->set('quote', $newQuote)
            ->assertSet('quote', $newQuote)
            ->assertNotSet('quote', '');
    }
}
