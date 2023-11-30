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
        Schema::create('gradable_period_states', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('gradable_period_id');
            $table->date('active_from');
            $table->date('active_until');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gradable_periods_status');
    }
};
