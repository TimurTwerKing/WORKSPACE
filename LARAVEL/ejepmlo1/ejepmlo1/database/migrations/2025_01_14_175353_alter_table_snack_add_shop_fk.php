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
        Schema::table("snacks", function (Blueprint $table) {
            // $table->unsignedBigInteger("shop_id");
            // $table->foreign("shop_id")->references("id")->on("shops")
            // ->onDelete("cascade")
            // ->onUpdate("cascade");
            
            // $table->foreignId("shop_id")->references("id")->on("shops")->onDelete("cascade")->onUpdate("cascade");
            $table->foreignId("shop_id")->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table("snacks", function (Blueprint $table) {
            $table->dropForeign("snacks_shop_id_foreign");
            $table->dropColumn("shop_id");
        });
    }
};
