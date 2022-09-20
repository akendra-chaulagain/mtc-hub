<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdmissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admissions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('cmat_rollno')->nullable();
            $table->string('category_group')->nullable();
            $table->string('personal_photo');
            $table->string('courses_title');
            $table->string('full_Name')->nullable();
            $table->string('nepali_full_name')->nullable();
            $table->integer('age');
            $table->string('gender');
            $table->string('nationality');
            $table->integer('phone_no');
            $table->integer('DOB');
            $table->string('email');
            $table->integer('mobile_no');



            $table->string('parmanent_address_provience');
            $table->string('parmanent_address_disctict');
            $table->string('parmanent_address_municipality');
            $table->string('parmanent_address_village');


            $table->string('temporary_address_provience');
            $table->string('temporary_address_disctict');
            $table->string('temporary_address_municipality');
            $table->string('temporary_address_village');


            $table->string('father_name');
            $table->string('mother_name');



            $table->string('name_of_Guardian');
            $table->string('guardian_address');
            $table->string('Guardian_phone_number');






            $table->string('name_of_institute_1');
            $table->string('university&board_1');
            $table->string('qualification_1');
            $table->string('year_of_graduation_1');
            $table->string('obtaines_mark_1');
            $table->string('file_1');

            $table->string('name_of_institute_2');
            $table->string('university&board_2');
            $table->string('qualification_2');
            $table->string('year_of_graduation_2');
            $table->string('obtaines_mark_2');
            $table->string('file_2');



            $table->string('name_of_institute_3');
            $table->string('university&board_3');
            $table->string('qualification_3');
            $table->string('year_of_graduation_3');
            $table->string('obtaines_mark_3');
            $table->string('file_3');
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
        Schema::dropIfExists('admissions');
    }
}
