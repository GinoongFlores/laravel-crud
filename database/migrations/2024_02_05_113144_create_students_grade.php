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
        Schema::create('grades', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('students');
            $table->decimal('subject_1', 8, 2)->default(0);
            $table->decimal('subject_2', 8, 2)->default(0);
            $table->decimal('subject_3', 8, 2)->default(0);
            $table->decimal('subject_4', 8, 2)->default(0);
            $table->decimal('subject_5', 8, 2)->default(0);
            $table->decimal('average', 8, 2)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grade');
    }
};
