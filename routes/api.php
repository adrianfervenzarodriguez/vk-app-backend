<?php

use App\Http\Controllers\GetTweetsByHashtagController;
use Illuminate\Support\Facades\Route;

Route::prefix('tweets')->group(function(){
    Route::get('/hashtags/{hashtag}', GetTweetsByHashtagController::class);
});
