<?php

namespace Database\Factories;

use App\Models\Tweet;
use Illuminate\Database\Eloquent\Factories\Factory;

class TweetFactory extends Factory
{
    protected $model = Tweet::class;

    protected function generateHashtags(int $max)
    {
        $hashtags = [];
        $appTargetHashtag = config('tweets.target_hashtag');
        foreach (range(1, random_int(1, $max)) as $_) {
            $hashtags[] = random_int(1, 20000) % random_int(1, 100) == 0 && !in_array($appTargetHashtag, $hashtags) ? $appTargetHashtag : fake()->word();
        }

        return json_encode($hashtags, JSON_UNESCAPED_UNICODE);
    }

    public function definition(): array
    {
        return [
            'user' => fake()->userName(),
            'content' => fake()->realText(140),
            'hashtags' => $this->generateHashtags(random_int(3, 10)),
            'likes_count' => fake()->numberBetween(0, 100),
            'published_at' => fake()->dateTimeBetween('-1 years'),
        ];
    }
}
