<?php

use Illuminate\Support\Facades\DB;
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
        DB::table('user_academic_degree')->insert([
            ['no_request' => '21878','code_academic_degree' => '1125-5104-4120'],
            ['no_request' => '21871','code_academic_degree' => '1125-5104-4121'],
            ['no_request' => '21873','code_academic_degree' => '1125-5104-4122'],
            ['no_request' => '21877','code_academic_degree' => '1125-5104-4123'],
            ['no_request' => '21879','code_academic_degree' => '1125-5104-4124'],
        ]);
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
