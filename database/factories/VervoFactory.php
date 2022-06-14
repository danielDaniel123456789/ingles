<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class VervoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'espayol' => $this->faker->word(),
            'ingles' => $this->faker->word(),
            'imagen' =>'https://images.emojiterra.com/google/android-10/512px/1f3e0.png',
            'ancho' =>200,
     ];

    }
}
