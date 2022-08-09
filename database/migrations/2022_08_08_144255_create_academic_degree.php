<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
            $table->string('id_entity');
            $table->integer('id_type');
            $table->string('name');

            $table->foreign('id_entity')->references('code')->on('entity');
            $table->foreign('id_type')->references('id')->on('type_academic_degree');
        });
        DB::table('academic_degree')->insert([
            ['id_entity' => '187-4', 'id_type' => 1,'name' => 'Titulo en Provisión Nacional Ingeniería en sistemas'],
            ['id_entity' => '187-4', 'id_type' => 2,'name' => 'Titulo Academico en Ingeniería en sistemas'],
            ['id_entity' => '187-3', 'id_type' => 1,'name' => 'Titulo en Provisión Nacional Ingeniería en Informatica'],
            ['id_entity' => '187-3', 'id_type' => 3,'name' => 'Diplomado en Seguridad Informatica'],
            ['id_entity' => '100-1', 'id_type' => 5,'name' => 'Maestria en Educación Superior'],
            ['id_entity' => '187-5', 'id_type' => 1,'name' => 'Titulo en Provisión Nacional Ingeniería en Redes y Telecomunicaciones'],
            ['id_entity' => '122-2', 'id_type' => 1,'name' => 'Titulo en Provisión Nacional Ingeniería Industrial'],
            ['id_entity' => '122-3', 'id_type' => 1,'name' => 'Titulo en Provisión Nacional Ingeniería Ambiental'],

        ]);
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
