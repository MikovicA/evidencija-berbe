<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('unos_berbes', function (Blueprint $table) {
            $table->id();
            $table->decimal('uneta_kolicina_kg', 8, 2);
            $table->foreignId('plan_berbe_id');
            $table->foreignId('user_id');
            $table->string('belongsTo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('unos_berbes');
    }
};
