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

        Schema::table('gradable_periods', function (Blueprint $table) {
            $table->unique('period');
        });

        Schema::table('student_grades', function (Blueprint $table) {
            $table->foreign('student_dni')->references('dni')->on('users')->onDelete('cascade');
            $table->foreign('subject_id')->references('id')->on('subjects');
            $table->foreign('gradable_period_id')->references('id')->on('gradable_periods');

            $table->unique(['student_dni', 'subject_id', 'gradable_period_id']);
        });

        Schema::table('student_guardians', function (Blueprint $table) {
            $table->primary(['dni']);
        });

        Schema::table('student_guardian_user', function (Blueprint $table) {
            $table->foreign('student_guardian_dni')->references('dni')->on('student_guardians')->onDelete('cascade');
            $table->foreign('user_dni')->references('dni')->on('users')->onDelete('cascade');

            $table->unique(['user_dni', 'student_guardian_dni']);
        });

        Schema::table('student_withdrawals', function (Blueprint $table) {
            $table->foreign('student_dni')->references('dni')->on('users');
            $table->foreign('student_guardian_dni')->references('dni')->on('student_guardians');
        });

        Schema::table('student_absence_reports', function (Blueprint $table) {
            $table->foreign('student_dni')->references('dni')->on('users')->onDelete('cascade');
        });

        Schema::table('student_grades_reports', function (Blueprint $table) {
            $table->foreign('student_dni')->references('dni')->on('users')->onDelete('cascade');

            $table->unique(['student_dni']);
        });

        Schema::table('posts', function (Blueprint $table) {
            $table->foreign('user_dni')->references('dni')->on('users')->onDelete('cascade');
            $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('cascade');
        });

        Schema::table('post_attachments', function (Blueprint $table) {
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
        });

        Schema::table('announcement_course', function (Blueprint $table) {
            $table->foreign('announcement_id')->references('id')->on('announcements')->onDelete('cascade');
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
        });

        Schema::table('student_warnings', fn (Blueprint $table) => $table->foreign('student_dni')->references('dni')->on('users')->onDelete('cascade')
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
