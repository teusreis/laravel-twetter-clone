<?php

namespace Database\Factories;

use App\Models\Tweet;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TweetFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tweet::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "body" => $this->faker->sentence,
            "user_id" => User::factory(),
        ];
    }

    public function user($id)
    {
        return $this->state([
            "user_id" => $id,
        ]);
    }
}
