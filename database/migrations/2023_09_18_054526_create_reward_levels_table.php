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
        Schema::create('reward_levels', function (Blueprint $table) {
            $table->id();
            $table->integer('reward_id')->nullable();
            $table->string('level_name')->nullable();
            $table->integer('paid_user')->nullable();
            $table->decimal('business_value', 28, 8)->nullable();
            $table->decimal('reward_amount', 28, 8)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reward_levels');
    }
};
