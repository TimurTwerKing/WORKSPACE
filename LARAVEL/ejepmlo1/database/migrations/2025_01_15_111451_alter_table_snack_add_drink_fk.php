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
        Schema::table("drinks", function (Blueprint $table) {
            $table->foreignId("shop_id")->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table("drinks", function (Blueprint $table) {
            $table->dropForeign("drinks_shop_id_foreign");
            $table->dropColumn("shop_id");
        });
    }
};
