<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('grades', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('course_id');
            // $table->unsignedBigInteger('classroom_id');
            $table->decimal('score', 5);
            $table->timestamps();

            // Restricciones de clave foránea
            $table->foreign('student_id')->references('id')->on('students');
            $table->foreign('course_id')->references('id')->on('courses');
            // $table->foreign('classroom_id')->references('id')->on('classrooms');
        });
    }

    public function down()
    {
        Schema::dropIfExists('grades');
    }
};

