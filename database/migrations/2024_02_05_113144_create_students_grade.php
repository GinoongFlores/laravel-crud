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
            // $table->foreignId('student_id')->constrained('students');
            $table->integer('subject_1');
            $table->integer('subject_2');
            $table->integer('subject_3');
            $table->integer('subject_4');
            $table->integer('subject_5');
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
