<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('semister')->nullable();
            $table->string('course_number');
            $table->string('courses_title');
            $table->integer('credit_hours')->nullable();
            $table->integer('internal_number')->nullable();
            $table->integer('theory_number');
            $table->integer('practical_final');
            $table->string('admission');
            $table->string('security_deposit');
            $table->string('exam_charge');
            $table->string('maintenance');
            $table->string('tuition_fee');
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
        Schema::dropIfExists('courses');
    }
}
