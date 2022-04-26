<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->date('date_birth');
            $table->string('academic_year');
            $table->bigInteger('gender_id')->unsigned();
            $table->bigInteger('nationalitie_id')->unsigned();  
            $table->bigInteger('blood_id')->unsigned();  
            $table->bigInteger('grade_id')->unsigned();
            $table->bigInteger('classroom_id')->unsigned();
            $table->bigInteger('section_id')->unsigned(); 
            $table->bigInteger('parent_id')->unsigned(); 
            $table->softDeletes();
            $table->timestamps();


            $table->foreign('gender_id')->references('id')->on('genders')->onDelete('cascade');
            $table->foreign('nationalitie_id')->references('id')->on('nationalities')->onDelete('cascade');
            $table->foreign('blood_id')->references('id')->on('typebloods')->onDelete('cascade');
            $table->foreign('grade_id')->references('id')->on('grades')->onDelete('cascade');
            $table->foreign('classroom_id')->references('id')->on('classrooms')->onDelete('cascade');
            $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade');
            $table->foreign('parent_id')->references('id')->on('my_parents')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
