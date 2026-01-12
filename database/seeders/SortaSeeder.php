<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sorta;

class SortaSeeder extends Seeder
{
    public function run(): void
    {
        Sorta::create(['naziv' => 'Vranac']);
        Sorta::create(['naziv' => 'Chardonnay']);
        Sorta::create(['naziv' => 'Cabernet Sauvignon']);
        Sorta::create(['naziv' => 'Merlot']);
    }
}
