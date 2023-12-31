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
        Schema::create('student_absence_reports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_dni');
            $table->date('date_of_absence');
            $table->text('comments')->nullable();
            $table->boolean('is_justified')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_absence_reports');
    }
};
