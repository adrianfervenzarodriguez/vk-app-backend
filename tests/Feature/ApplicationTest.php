<?php

namespace Tests\Feature;

use Tests\TestCase;

class ApplicationTest extends TestCase
{

    public function test_api_returns_a_successful_response(): void
    {
        $response = $this->get('/api/tweets/hashtags/farina');

        $response->assertStatus(200);
    }
}
