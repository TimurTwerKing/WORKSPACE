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
        Schema::create('ingredient_snack', function (Blueprint $table) {
            // La tabla "poivote" es la unica que va en singular
            // Se nombra con los nombres de las dos tablas relacionadas EN ORDEN ALFABETICO y separadas por "_"
            $table->id();
            $table->timestamps();
            $table->foreignId("ingredient_id")->constrained();
            $table->foreignId("snack_id")->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table("ingredient_snack", function (Blueprint $table) {
            // Elimina una columna y su FK asociada
            $table->dropConstrainedForeignId("snack_id");
            $table->dropConstrainedForeignId("ingredient_id");

        });
        Schema::dropIfExists('ingredient_snack');
    }
};
