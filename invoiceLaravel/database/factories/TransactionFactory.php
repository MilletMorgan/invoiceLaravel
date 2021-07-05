<?php

namespace Database\Factories;

use App\Models\Transaction;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TransactionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Transaction::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => Str::uuid(),
            'source_type' => $this->faker->randomElement(['mission', 'contribution']),
            'source_id' => Str::uuid(),
            'paid_at' => $this->faker->dateTime($max = 'now', $timezone = null),
            'created_at' => $this->faker->dateTime($max = 'now', $timezone = null)
        ];
    }
}
