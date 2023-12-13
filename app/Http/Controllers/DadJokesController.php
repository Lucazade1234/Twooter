<?php

// app/Http/Controllers/YourController.php

namespace App\Http\Controllers;

use App\Services\ExternalApiService;

class DadJokesController extends Controller
{
    protected $externalApiService;

    public function __construct(ExternalApiService $externalApiService)
    {
        $this->externalApiService = $externalApiService;
    }

    public function getJoke()
    {
        $data = $this->externalApiService->fetchData();
        return $data;
    }
}
