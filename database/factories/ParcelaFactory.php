<?php

namespace Database\Factories;

use App\Models\Parcela;
use Illuminate\Database\Eloquent\Factories\Factory;

class ParcelaFactory extends Factory
{
    protected $model = Parcela::class;

    public function definition(): array
    {
        return [
            'naziv' => $this->faker->word(),
            'povrsina_ha' => $this->faker->randomFloat(2, 0.5, 10),
        ];
    }
}
