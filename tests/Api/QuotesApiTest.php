<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Services\QuotesService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Tests\TestCase;

class QuotesApiTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        // Add any necessary setup here
    }

    public function testGetRandomKanyeQuoteApi()
    {
        $this->actingAs($user = User::factory()->create());

        $this->mock(QuotesService::class, function ($mock) {
            $mock->shouldReceive('getRandomKanyeQuote')->once()->andReturn('Test quote');
        });

        $this->json('get', '/api/kanye/quote')
            ->assertStatus(Response::HTTP_OK)
            ->assertJsonStructure(['quote'])
            ->assertJson(['quote' => 'Test quote']);
    }

    public function testGetMultipleKanyeQuotesApi()
    {
        $this->actingAs($user = User::factory()->create());

        $this->mock(QuotesService::class, function ($mock) {
            $mock->shouldReceive('getMultipleKanyeQuotes')->once()->with(3)->andReturn(['Quote 1', 'Quote 2', 'Quote 3']);
        });

        $this->json('get', '/api/kanye/quotes/3')
            ->assertStatus(Response::HTTP_OK)
            ->assertJsonStructure(['quotes'])
            ->assertJson(['quotes' => ['Quote 1', 'Quote 2', 'Quote 3']]);
    }

    public function testGetMultipleKanyeQuotesApiWithDefaultLimit()
    {
        $this->actingAs($user = User::factory()->create());

        $this->mock(QuotesService::class, function ($mock) {
            $mock->shouldReceive('getMultipleKanyeQuotes')->once()->with(5)->andReturn(['Quote 1', 'Quote 2', 'Quote 3', 'Quote 4', 'Quote 5']);
        });

        $this->json('get', '/api/kanye/quotes/5')
            ->assertStatus(Response::HTTP_OK)
            ->assertJsonStructure(['quotes'])
            ->assertJsonCount(5, 'quotes');
    }
}
