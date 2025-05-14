<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;



/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\unsur>
 */
class unsurFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $dayOffset = 0;
        return [
            'record_date' => Carbon::create(2025, 1, 1)->addDays($dayOffset++)->toDateString(),
            'pH' => $this->faker->randomFloat(2, 0, 14),
            'TDS' => $this->faker->randomFloat(2, 0, 1000),
            'suhu' => $this->faker->randomFloat(2, 0, 100),
        ];
    }
}
