<?php

namespace App\Services;

use Exception;
use Illuminate\Support\Facades\Http;

class FakeTwitterAPIService
{

    public function __invoke(string $hashtag)
    {
        $response = Http::fkTwitterApi()->get("/tweets/hashtag/{$hashtag}");

        if ($response->failed()){
            throw new Exception("Error al obtener los Tweets de la API externa.");
        }

        return $response->json();
    }


}
