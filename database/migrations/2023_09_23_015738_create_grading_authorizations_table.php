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
        Schema::create('grading_authorizations', function (Blueprint $table) {
            $table->id();
            $table->enum('period', [
                'period_1',
                'period_2',
                'period_3',
                'extra_exam_1',
                'extra_exam_2',
                'final_score',
            ]);
            $table->boolean('state')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grading_authorizations');
    }
};
