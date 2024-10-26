<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\QuotesApiController;

/*
|--------------------------------------------------------------------------
| RESTFul API Routes
|--------------------------------------------------------------------------I
| OAuth2 Authentication protocol with Sanctum
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
| Note: Authorization to api from web allowed by cookie
| Note: Authorization from external sources by header Authorization: Bearer + {token}
*/

// User authenticated group
Route::middleware('auth:sanctum')->name('api.')->group(function () {


    Route::get('/profile', function (Request $request) { return $request->user();});

    Route::get('kanye/quote', [QuotesApiController::class, 'getRandomQuote']);
    Route::get('kanye/quotes/{limit}', [QuotesApiController::class, 'getMultipleQuotes'])->where('limit', '[0-9]+');
});
