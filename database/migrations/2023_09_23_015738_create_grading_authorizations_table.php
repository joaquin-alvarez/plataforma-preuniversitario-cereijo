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
            $table->unsignedBigInteger('student_grade_id');
            $table->enum('score_column', [
                'period_1_score',
                'period_2_score',
                'period_3_score',
                'extra_exam_1_score',
                'extra_exam_2_score',
                'final_score',
            ]);
            $table->boolean('authorization_state')->default(true);
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
