<?php
namespace App\Services;

use Illuminate\Support\Facades\Config;
use GuzzleHttp\Client;

class ExternalApiService
{
    public function fetchData()
    {
        $client = new Client();

        $apiKey = Config::get('services.external_api.key');

        $response = $client->request('GET', 'https://api.api-ninjas.com/v1/dadjokes?limit=1', [
            'headers' => [
                'X-API-Key' => $apiKey,
            ],
        ]);

        $responseData = json_decode($response->getBody(), true);
        
        $joke = isset($responseData[0]['joke']) ? $responseData[0]['joke'] : null;

        return $joke;
    }
}


