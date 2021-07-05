<?php

namespace Database\Factories;

use App\Models\Mission;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class MissionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Mission::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => Str::uuid(),
            'reference' => $this->faker->text($maxNbChars = 10),
            'title' => $this->faker->text($maxNbChars = 10),
            'comment' => $this->faker->text(),
            'deposit' => $this->faker->randomDigit(),
            'ended_at' => $this->faker->dateTime($max = 'now', $timezone = null)
        ];
    }
}
