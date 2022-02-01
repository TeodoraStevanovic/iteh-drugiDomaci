<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BreedFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
           // 'name' => $this->faker->word()
           'name' => $this->faker->randomElement($array = array ('Beagle','Maltese','Pug','Akita','Pomeranian','Poodle','Golden Retriever'))
        ];
    }
}
