<?php

namespace Database\Factories;

use App\Models\Contribution;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ContributionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Contribution::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => Str::uuid(),
            'price' => $this->faker->randomDigit(),
            'title' => $this->faker->text($maxNbChars = 15),
            'comment' => $this->faker->text(),
            'created_at' => $this->faker->dateTime($max = 'now', $timezone = null)
        ];
    }
}
