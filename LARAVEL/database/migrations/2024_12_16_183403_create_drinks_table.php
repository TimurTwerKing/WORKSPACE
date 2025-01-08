<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
   
    public function up()
    {
        Schema::create('drinks', function (Blueprint $table) {
            $table->id();
            $table->string('name',32);
            $table->string('brand',32); 
            $table->decimal('ml', 5, 2); 
            $table->decimal('price', 8, 2); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drinks');
    }
};
