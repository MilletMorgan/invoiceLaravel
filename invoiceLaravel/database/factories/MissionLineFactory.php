<?php

namespace Database\Factories;

use App\Models\MissionLine;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class MissionLineFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MissionLine::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => Str::uuid(),
            'title' => $this->faker->text($maxNbChars = 15),
            'quantity' => $this->faker->randomDigit(),
            'price' => $this->faker->randomDigit(),
            'unity' => $this->faker->randomElement(['jours', 'semaine', 'mois'])
        ];
    }
}
