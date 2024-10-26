<?php

namespace App\Http\Controllers;

use App\Services\QuotesService;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        // Fetch initial quotes
        $quotesService = new QuotesService();
        $allQuotes = $quotesService->getMultipleKanyeQuotes(100000);
        $initialQuotes = array_rand(array_flip($allQuotes), 8);

        return view('pages.index.index', [
            'initialQuotes' => $initialQuotes
        ]);
    }
}
