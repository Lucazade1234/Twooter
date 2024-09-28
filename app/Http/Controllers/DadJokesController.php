<?php

// app/Http/Controllers/YourController.php

namespace App\Http\Controllers;

use App\Services\ExternalApiService;

class DadJokesController extends Controller
{
    protected $externalApiService;

    public function __construct()
    {
        $this->externalApiService = app(ExternalApiService::class);
    }

    public function getJoke()
    {
        $data = $this->externalApiService->fetchData();
        return $data;
    }
}
