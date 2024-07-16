<?php

namespace App\Providers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        Http::macro('fkTwitterApi', function () {
            return Http::withHeaders([
                'Accept' => 'application/json',
            ])
            ->withToken(config('fk_twitter_external_api.token'))
            ->baseUrl(config('fk_twitter_external_api.url'));
        });
    }
}
