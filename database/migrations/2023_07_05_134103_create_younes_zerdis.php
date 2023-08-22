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
        Schema::create('younes_zerdis', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('Nom');
            $table->string('Jours de travaille');
            $table->string('Date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('younes_zerdis');
    }
};
