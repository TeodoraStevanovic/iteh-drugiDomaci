<?php

namespace Database\Factories;

use App\Models\Breed;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class DogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->firstName(),
            'date_of_birth' => $this->faker->dateTime(),
            'age' => $this->faker->numberBetween(0,17),
            'breed_id' => Breed::factory(),
            'user_id' => User::factory(),
        ];
    }
}
