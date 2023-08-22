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
       
            if (!Schema::hasColumn('younes_zerdis', 'Heures sup')) {
                Schema::table('younes_zerdis', function (Blueprint $table) {
                    $table->string('Heures sup');
                });
            }
           
        ;
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('younes_zerdis', function (Blueprint $table) {
            //
           
        });
    }
};
