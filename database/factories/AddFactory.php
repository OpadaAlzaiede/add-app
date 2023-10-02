<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AddFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->text(20),
            'description' => $this->faker->text(200),
            'price' => $this->faker->numberBetween(1, 100),
            'image_url' => $this->faker->url
        ];
    }
}
