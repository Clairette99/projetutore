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
        Schema::create('colis', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->nullable();
            $table->string('poids');
            $table->string('heure_depart');
            $table->string('heure_arrivee');
            $table->boolean('is_published')->default(false);
            $table->foreignId('emetteur_id')->on('users')->nullable()->index();
            $table->foreignId('transporteur_id')->on('users')->nullable()->index();
            $table->string('recepteur');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('colis');
    }
};
