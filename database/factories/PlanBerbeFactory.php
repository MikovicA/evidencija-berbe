<?php

namespace Database\Factories;

use App\Models\Parcela;
use App\Models\Sorta;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PlanBerbeFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'datum' => fake()->date(),
            'planirana_kolicina_kg' => fake()->randomFloat(2, 0, 999999.99),
            'status' => fake()->word(),
            'parcela_id' => Parcela::factory(),
            'sorta_id' => Sorta::factory(),
            'user_id' => User::factory(),
            'hasMany' => fake()->word(),
            'belongsTo' => fake()->word(),
        ];
    }
}
