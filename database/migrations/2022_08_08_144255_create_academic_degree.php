<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcademicDegree extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academic_degree', function (Blueprint $table) {
            $table->id();
            $table->integer('id_entity');
            $table->integer('id_type');
            $table->string('name');
            $table->foreign('id_entity')->references('id')->on('entity');
            $table->foreign('id_type')->references('id')->on('type_academic_degree');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('academic_degree');
    }
}
