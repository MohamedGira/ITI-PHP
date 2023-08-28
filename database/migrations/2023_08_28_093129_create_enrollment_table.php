<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enrollment', function (Blueprint $table) {
            //since we use conventions
            $table->foreignId('student_id')->constrained(table: 'student')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('course_id')->constrained(table: 'course')->onUpdate('cascade')->onDelete('cascade');       
            $table->primary(['student_id', 'course_id']);	
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enrollment');
    }
};
