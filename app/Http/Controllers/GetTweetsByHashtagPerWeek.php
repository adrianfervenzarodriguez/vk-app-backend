<?php

namespace App\Http\Controllers;

use App\Http\Requests\GetTweetsByHashtagRequest;
use App\Services\ChartService;
use Illuminate\Http\JsonResponse;

class GetTweetsByHashtagPerWeek extends Controller
{
    private $chartService;

    public function __construct(ChartService $chartService)
    {
        $this->chartService = $chartService;
    }

    public function __invoke(GetTweetsByHashtagRequest $request) : JsonResponse
    {
        $validatedRequest = $request->validated();
        $hashtag = $validatedRequest['hashtag'];

        $chartData = $this->chartService->tweetsByHashtagPerWeekLastMonth($hashtag);

        return response()->json($chartData);
    }
}
