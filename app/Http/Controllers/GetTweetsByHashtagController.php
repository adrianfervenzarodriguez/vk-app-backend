<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Http\Requests\GetTweetsByHashtagRequest;
use App\Services\GetTweetsByHashtagService;

class GetTweetsByHashtagController extends Controller
{
    private $getTweetsByHashtagService;

    public function __construct(GetTweetsByHashtagService $getTweetsByHashtagService)
    {
        $this->getTweetsByHashtagService = $getTweetsByHashtagService;
    }

    public function __invoke(GetTweetsByHashtagRequest $request) : JsonResponse
    {
        $validatedRequest = $request->validated();

        $hashtag = $validatedRequest['hashtag'];
        $getFromExternal = $validatedRequest['getFromExternal'];

        $tweets = $this->getTweetsByHashtagService->__invoke($hashtag, $getFromExternal);

        return response()->json($tweets);
    }
}
