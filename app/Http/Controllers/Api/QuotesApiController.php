<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\QuotesService;
use Illuminate\Http\Request;

class QuotesApiController extends Controller
{
    private $quotesService;

    public function __construct(QuotesService $quotesService)
    {
        $this->quotesService = $quotesService;
    }

    /**
     * SWAGGER DOCS
     * @OA\Get(
     *      path="/api/kanye/quote",
     *      operationId="getRandomKanyeQuote",
     *      tags={"Quotes"},
     *      summary="Get a random Kanye West quote",
     *      description="Returns a random Kanye West quote",
     *      @OA\Response(response=200, description="Successful operation")
     * )
     */

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getRandomQuote()
    {
        $quote = $this->quotesService->getRandomKanyeQuote();
        return response()->json(['quote' => $quote]);
    }

    /**
     * @OA\Get(
     *      path="/api/kanye/quotes/{limit}",
     *      operationId="getMultipleKanyeQuotes",
     *      tags={"Quotes"},
     *      summary="Get multiple Kanye West quotes",
     *      description="Returns multiple Kanye West quotes with an optional limit",
     *      @OA\Parameter(
     *          name="limit",
     *          in="path",
     *          required=true,
     *          description="Number of quotes to return",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(response=200, description="Successful operation")
     * )
     */

     public function getMultipleQuotes($limit = 5)
     {
         $limit = max(1, min((int)$limit, 10000)); // Ensure limit is between 1 and 10
         $quotes = $this->quotesService->getMultipleKanyeQuotes($limit);
         return response()->json(['quotes' => $quotes]);
     }
}
