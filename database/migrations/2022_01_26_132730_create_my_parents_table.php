<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMyParentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('my_parents', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('password');

            //Fatherinformation
            $table->string('name_Father');
            $table->string('national_ID_Father');
            $table->string('passport_ID_Father');
            $table->string('phone_Father');
            $table->string('job_Father');
            $table->bigInteger('nationality_Father_id')->unsigned();
            $table->bigInteger('blood_Type_Father_id')->unsigned();
            $table->bigInteger('religion_Father_id')->unsigned();
            $table->string('address_Father');

            //Mother information
            $table->string('name_Mother');
            $table->string('national_ID_Mother');
            $table->string('passport_ID_Mother');
            $table->string('phone_Mother');
            $table->string('job_Mother');
            $table->bigInteger('nationality_Mother_id')->unsigned();
            $table->bigInteger('blood_Type_Mother_id')->unsigned();
            $table->bigInteger('religion_Mother_id')->unsigned();
            $table->string('address_Mother');
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
        Schema::dropIfExists('my_parents');
    }
}
