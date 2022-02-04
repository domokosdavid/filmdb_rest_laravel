<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FilmFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $kategoriak = ['akció', 'kaland', 'sci-fi', 'horror', 'dráma', 'vígjáték', 'fantasy', 'romantikus'];
        return [
            "cim" => $this->faker->sentence($this->faker->numberBetween(3, 5)),
            "kategoria" => implode(", ", $this->faker->randomElements($kategoriak, $this->faker->numberBetween(1, 5))),
            "hossz" => $this->faker->numberBetween(60, 200),
            "ertekeles" => ($this->faker->randomDigit() + 1)
        ];
    }
}
