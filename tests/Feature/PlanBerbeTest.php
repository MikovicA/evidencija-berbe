<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PlanBerbeTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function radnik_ne_moze_pristupiti_planu_berbe()
    {
        /** @var \App\Models\User $radnik */
        $radnik = User::factory()->create([
            'role' => 'radnik',
        ]);

        $response = $this->actingAs($radnik)->get('/plan-berbes');

        $response->assertStatus(403);
    }

    /** @test */
    public function gazda_moze_vidjeti_plan_berbe()
    {
        /** @var \App\Models\User $gazda */
        $gazda = User::factory()->create([
            'role' => 'gazda',
        ]);

        $response = $this->actingAs($gazda)->get('/plan-berbes');

        $response->assertStatus(200);
    }
}
