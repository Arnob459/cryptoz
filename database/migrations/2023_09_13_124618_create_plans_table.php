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
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->tinyInteger('amount_type')->nullable()->default(0);
            $table->decimal('fixed_amount', 28, 8)->nullable();
            $table->decimal('min_amount', 28, 8)->nullable();
            $table->decimal('max_amount', 28, 8)->nullable();
            $table->decimal('yearly_capitals', 28, 8)->nullable();
            $table->decimal('daily_earning', 28, 8)->nullable();
            $table->tinyInteger('status')->nullable()->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plans');
    }
};
