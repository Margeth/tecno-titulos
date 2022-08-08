<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcademicDegreeRequirement extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academic_degree_requirement', function (Blueprint $table) {
            $table->id();
            $table->integer('id_type_academic_degree');
            $table->integer('id_requirement');
            $table->foreign('id_type_academic_degree')->references('id')->on('type_academic_degree');
            $table->foreign('id_requirement')->references('id')->on('requirement');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('academic_degree_requirement');
    }
}
