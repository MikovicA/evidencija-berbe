<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\PlanBerbe;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UnosBerbeTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function radnik_moze_unijeti_berbu()
    {
        /** @var \App\Models\User $radnik */
        $radnik = User::factory()->create([
            'role' => 'radnik',
        ]);

        $plan = PlanBerbe::factory()->create();

        $response = $this->actingAs($radnik)->post('/unos-berbes', [
            'plan_berbe_id' => $plan->id,
            'uneta_kolicina_kg' => 120,
        ]);

        $response->assertStatus(302); // redirect nakon uspešnog unosa
        $this->assertDatabaseHas('unos_berbes', [
            'plan_berbe_id' => $plan->id,
            'uneta_kolicina_kg' => 120,
        ]);
    }
}
