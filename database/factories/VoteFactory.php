<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class VoteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'idea_id' => $this->faker->numberBetween(1, 100),
            'user_id' => $this->faker->numberBetween(1, 20),
        ];
    }
}
