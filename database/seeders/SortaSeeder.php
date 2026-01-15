<?php

namespace Database\Seeders;

use App\Models\Sorta;
use Illuminate\Database\Seeder;

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
