<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForeignKeysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('my_parents', function(Blueprint $table) {
            //Info Father
            $table->foreign('nationality_Father_id')->references('id')->on('nationalities');
            $table->foreign('blood_Type_Father_id')->references('id')->on('typebloods');
            $table->foreign('religion_Father_id')->references('id')->on('religions');
            //Info Mother
            $table->foreign('nationality_Mother_id')->references('id')->on('nationalities');
            $table->foreign('blood_Type_Mother_id')->references('id')->on('typebloods');
            $table->foreign('religion_Mother_id')->references('id')->on('religions');
        });

        Schema::table('parents_attachments', function(Blueprint $table) {
            $table->foreign('parent_id')->references('id')->on('my_parents');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        /* Schema::dropIfExists('foreign_keys'); */
    }
}
