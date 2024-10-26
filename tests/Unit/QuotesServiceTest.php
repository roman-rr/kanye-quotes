<?php

namespace Tests\Unit;

use App\Services\QuotesService;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

class QuotesServiceTest extends TestCase
{
    private $quotesService;
    private $mockHandler;

    protected function setUp(): void
    {
        parent::setUp();

        $this->mockHandler = new MockHandler();
        $handlerStack = HandlerStack::create($this->mockHandler);
        $client = new Client(['handler' => $handlerStack]);

        $this->quotesService = new QuotesService();
        $this->quotesService->setClient($client);
    }

    public function test_get_random_kanye_quote()
    {
        $this->mockHandler->append(new Response(200, [], json_encode(['quote' => 'Test quote'])));

        $quote = $this->quotesService->getRandomKanyeQuote();

        $this->assertEquals('Test quote', $quote);
    }

    public function test_get_multiple_kanye_quotes()
    {
        $this->mockHandler->append(new Response(200, [], json_encode(['quotes' => ['Quote 1', 'Quote 2', 'Quote 3', 'Quote 4', 'Quote 5']])));

        $quotes = $this->quotesService->getMultipleKanyeQuotes(5);

        $this->assertCount(5, $quotes['quotes']);
    }

    public function test_get_random_kanye_quote_throws_exception_on_api_error()
    {
        $this->mockHandler->append(new Response(500, []));

        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('Failed to fetch quote from the API');

        $this->quotesService->getRandomKanyeQuote();
    }
}
