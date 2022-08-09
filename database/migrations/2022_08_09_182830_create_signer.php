<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSigner extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('signer', function (Blueprint $table) {
            $table->id();
            $table->integer('id_minute');
            $table->string('code_user_academic_degre')->nullable();
            $table->bigInteger('code');
            $table->integer('id_step');
            $table->boolean('is_signed')->default(false);
            $table->timestamps();

            $table->foreign('id_minute')->references('id')->on('minute');
            $table->foreign('code_user_academic_degre')->references('code_academic_degree')->on('user_academic_degree');
            $table->foreign('code')->references('code')->on('admin_users');
            $table->foreign('id_step')->references('id')->on('step_signer');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('signer');
    }
}
