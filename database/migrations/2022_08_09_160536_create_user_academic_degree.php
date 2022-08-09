<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserAcademicDegree extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_academic_degree', function (Blueprint $table) {
            $table->id();
            $table->integer('no_request');
            $table->string('code_academic_degree')->unique();
            $table->timestamps();
            $table->foreign('no_request')->references('no_request')->on('procedure_request');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_academic_degree');
    }
}
