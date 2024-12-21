<?php

namespace Database\Factories;

use App\Models\Pays;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Province>
 */
class ProvinceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom' => $this->faker->state,
            'pays_id' => Pays::inRandomOrder()->pluck('id')->first() // exist only

        ];
    }
}
