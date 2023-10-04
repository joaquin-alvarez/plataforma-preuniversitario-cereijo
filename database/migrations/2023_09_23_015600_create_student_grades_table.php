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
        Schema::create('student_grades', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_dni');
            $table->unsignedBigInteger('subject_id');
            $table->decimal('period_1_score', 2, 1, true)->nullable();
            $table->decimal('period_2_score', 2, 1, true)->nullable();
            $table->decimal('period_3_score', 2, 1, true)->nullable();
            $table->decimal('extra_exam_1_score', 2, 1, true)->nullable();
            $table->decimal('extra_exam_2_score', 2, 1, true)->nullable();
            $table->tinyInteger('final_score')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_grades');
    }
};
