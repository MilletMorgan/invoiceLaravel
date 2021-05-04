<?php

namespace Database\Factories;

use App\Models\Organisation;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class OrganisationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Organisation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => Str::uuid(),
            'slug' => $this->faker->unique()->text(),
            'name' => $this->faker->name(),
            'email' => $this->faker->email(),
            'tel' => $this->faker->phoneNumber(),
            'address' => $this->faker->text($maxNbChars = 15),
            'type' => $this->faker->randomElement(['school', 'client', 'government'])
        ];
    }
}
