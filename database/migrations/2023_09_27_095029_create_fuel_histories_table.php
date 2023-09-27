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
        Schema::create('fuel_histories', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('generator_id')->constrained('generators')->cascadeOnDelete();
            $table->unsignedDecimal('amount');
            $table->unsignedSmallInteger('type');
            $table->dateTime('history_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fuel_histories');
    }
};
