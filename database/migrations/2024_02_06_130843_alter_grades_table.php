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
        //
        Schema::table('grades', function (Blueprint $table) {
            $table->decimal('subject_1', 8, 2)->change();
            $table->decimal('subject_2', 8, 2)->change();
            $table->decimal('subject_3', 8, 2)->change();
            $table->decimal('subject_4', 8, 2)->change();
            $table->decimal('subject_5', 8, 2)->change();
            $table->decimal('average', 8, 2)->change();
            $table->foreignId('student_id')->constrained('students');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::table('grades', function (Blueprint $table) {
            $table->dropForeign(['student_id']); // drop the foreign key first before dropping the column
        });
    }
};
