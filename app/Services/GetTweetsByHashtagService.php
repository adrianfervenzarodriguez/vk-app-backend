<?php

namespace App\Services;

use App\Models\Tweet;
use Carbon\Carbon;

class GetTweetsByHashtagService
{
    private $fakeTwitterApiService;

    public function __construct(FakeTwitterAPIService $fakeTwitterApiService)
    {
        $this->fakeTwitterApiService = $fakeTwitterApiService;
    }

    private function externalTweetsToDatabase($externalTweets)
    {
        $formattedTweets = array_map(function($tweet){
            return [
                'id' => $tweet['id'],
                'user' => $tweet['user'],
                'content' => $tweet['content'],
                'hashtags' => $tweet['hashtags'],
                'likes_count' => $tweet['likes_count'],
                'published_at' => $tweet['published_at'],
                'created_at' => Carbon::now()
            ];
        }, $externalTweets);

        Tweet::truncate();
        Tweet::insert($formattedTweets);
    }

    public function __invoke(string $hashtag, int|null $getFromExternal) : array
    {
        if ($getFromExternal){
            $fromExternalTweets = $this->fakeTwitterApiService->__invoke($hashtag);
            $this->externalTweetsToDatabase($fromExternalTweets['data']);
        }

        $tweets = Tweet::whereJsonContains('hashtags', $hashtag)->get();

        return $tweets->toArray();
    }
}
