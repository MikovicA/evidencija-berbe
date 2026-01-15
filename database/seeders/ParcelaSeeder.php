<?php

namespace Database\Seeders;

use App\Models\Parcela;
use Illuminate\Database\Seeder;

class ParcelaSeeder extends Seeder
{
    public function run(): void
    {
        Parcela::create([
            'naziv' => 'Topla 3',
            'povrsina_ha' => 1.5,
        ]);

        Parcela::create([
            'naziv' => 'Prijevor',
            'povrsina_ha' => 2.0,
        ]);

        Parcela::create([
            'naziv' => 'Kameno',
            'povrsina_ha' => 0.9,
        ]);
    }
}
