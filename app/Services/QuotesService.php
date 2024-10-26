<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use JsonException;

class QuotesService
{
    private $client;
    private const API_URL = 'https://api.kanye.rest';

    public function __construct()
    {
        $this->client = new Client();
    }

    public function setClient($client)
    {
        $this->client = $client;
    }

    public function getRandomKanyeQuote()
    {
        try {
            $response = $this->client->get(self::API_URL);
            $data = json_decode($response->getBody(), true);

            if (isset($data['quote'])) {
                return $data['quote'];
            } else {
                throw new \RuntimeException('Unexpected response format from the API');
            }
        } catch (GuzzleException $e) {
            throw new \RuntimeException('Failed to fetch quote from the API: ' . $e->getMessage());
        } catch (\JsonException $e) {
            throw new \RuntimeException('Failed to parse API response: ' . $e->getMessage());
        }
    }

    public function makePayment(array $data)
    {
        // API call to third-party provider
    }

    public function getMultipleKanyeQuotes($limit = null)
    {
        try {
            $response = $this->client->get(self::API_URL . '/quotes');
            $data = json_decode($response->getBody(), true, 512, JSON_THROW_ON_ERROR);

            if (is_array($data)) {
                return array_slice($data, 0, (int)$limit);
            } else {
                throw new \RuntimeException('Unexpected response format from the API');
            }
        } catch (GuzzleException $e) {
            throw new \RuntimeException('Failed to fetch quotes from the API: ' . $e->getMessage());
        } catch (\JsonException $e) {
            throw new \RuntimeException('Failed to parse API response: ' . $e->getMessage());
        }
    }
}
