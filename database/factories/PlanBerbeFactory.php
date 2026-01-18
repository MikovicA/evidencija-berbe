<?php

namespace Database\Factories;

use App\Models\Parcela;
use App\Models\PlanBerbe;
use App\Models\Sorta;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PlanBerbeFactory extends Factory
{
    protected $model = PlanBerbe::class;

    public function definition(): array
    {
        return [
            'datum' => now(),
            'parcela_id' => Parcela::factory(),
            'sorta_id' => Sorta::factory(),
            'planirana_kolicina_kg' => 500,
            'status' => 'planirano',
            'user_id' => User::factory()->state([
                'role' => 'gazda',
            ]),
        ];
    }
}
