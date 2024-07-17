<?php

use App\Http\Controllers\GetTweetsByHashtagController;
use App\Http\Controllers\GetTweetsByHashtagPerMonth;
use App\Http\Controllers\GetTweetsByHashtagPerWeek;
use Illuminate\Support\Facades\Route;

Route::prefix('tweets')->group(function(){
    Route::get('/hashtags/{hashtag}', GetTweetsByHashtagController::class);
    Route::get('/hashtags/{hashtag}/charts/count_per_month', GetTweetsByHashtagPerMonth::class);
    Route::get('/hashtags/{hashtag}/charts/count_per_week', GetTweetsByHashtagPerWeek::class);
});
