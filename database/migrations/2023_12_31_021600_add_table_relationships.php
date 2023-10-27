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

            $table->unique(['student_dni', 'subject_id']);
        });

        Schema::table('student_guardians', function (Blueprint $table) {
            $table->primary(['dni']);
        });

        Schema::table('student_guardian_user', function (Blueprint $table) {
            $table->foreign('user_dni')->references('dni')->on('users');
            $table->foreign('student_guardian_dni')->references('dni')->on('student_guardians');

            $table->unique(['user_dni', 'student_guardian_dni']);
        });

        Schema::table('student_withdrawals', function (Blueprint $table) {
            $table->foreign('student_dni')->references('dni')->on('users');
            $table->foreign('student_guardian_dni')->references('dni')->on('student_guardians');
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
