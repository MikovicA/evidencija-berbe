<?php

namespace Database\Factories;

use App\Models\PlanBerbe;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class UnosBerbeFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'uneta_kolicina_kg' => fake()->randomFloat(2, 0, 999999.99),
            'plan_berbe_id' => PlanBerbe::factory(),
            'user_id' => User::factory(),
            'belongsTo' => fake()->word(),
        ];
    }
}
