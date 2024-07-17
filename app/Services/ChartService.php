<?php

namespace App\Services;

use App\Models\Tweet;
use Illuminate\Support\Facades\DB;

class ChartService
{
    public function tweetsByHashtagPerMonth(string $hashtag) : array
    {
        $tweets = Tweet::select([
            DB::raw('MONTHNAME(published_at) as month'),
            DB::raw('COUNT(*) as tweets'),
        ])
        ->whereJsonContains('hashtags', $hashtag)
        ->orderBy(DB::raw('MONTH(published_at)'), 'ASC')
        ->groupBy(DB::raw('MONTHNAME(published_at)'))
        ->get();

        return $tweets->toArray();
    }

    public function tweetsByHashtagPerWeekLastMonth(string $hashtag)
    {
        $tweets = Tweet::select([
            DB::raw('WEEK(published_at) as week'),
            DB::raw('COUNT(*) as tweets'),
        ])
        ->whereJsonContains('hashtags', $hashtag)
        ->whereRaw('MONTH(published_at) = MONTH(NOW())')
        ->orderBy(DB::raw('WEEK(published_at)'), 'ASC')
        ->groupBy(DB::raw('WEEK(published_at)'))->get();

        return $tweets->toArray();
    }

}
