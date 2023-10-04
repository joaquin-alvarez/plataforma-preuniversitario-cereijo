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
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('role_id')->references('id')->on('roles');
            $table->foreign('course_id')->references('id')->on('courses');
        });

        Schema::table('subjects', function (Blueprint $table) {
            $table->foreign('course_id')->references('id')->on('courses');
            $table->foreign('teacher_dni')->references('dni')->on('users')->onDelete('set null');
        });

        Schema::table('student_grades', function (Blueprint $table) {
            $table->foreign('student_dni')->references('dni')->on('users')->onDelete('cascade');
            $table->foreign('subject_id')->references('id')->on('subjects');

            $table->index(['student_dni', 'subject_id']);
        });

        Schema::table('grading_authorizations', function (Blueprint $table) {
            $table->foreign('student_grade_id')->references('id')->on('student_grades')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
