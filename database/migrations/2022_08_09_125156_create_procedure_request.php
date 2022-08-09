<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProcedureRequest extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('procedure_request', function (Blueprint $table) {
            $table->id();
            $table->integer('no_request');
            $table->integer('id_academic_degree');
            $table->integer('id_request_state');
            $table->integer('user_student');
            $table->integer('user_transcriber');

            $table->foreign('id_academic_degree')->references('id')->on('academic_degree');
            $table->foreign('id_request_state')->references('id')->on('request_state');
            $table->foreign('user_student')->references('code')->on('admin_users');
            $table->foreign('user_transcriber')->references('code')->on('admin_users');
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
        Schema::dropIfExists('procedure_request');
    }
}
