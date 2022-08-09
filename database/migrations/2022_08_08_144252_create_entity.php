<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateEntity extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entity', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('name');
        });
        DB::table('entity')->insert([
            ['code' => '187-4', 'name' => 'Ingeniería en sistemas'],
            ['code' => '187-3', 'name' => 'Ingeniería en Informatica'],
            ['code' => '187-5', 'name' => 'Ingeniería en Redes y Telecomunicaciones'],
            ['code' => '122-2', 'name' => 'Ingeniería Industrial'],
            ['code' => '122-3', 'name' => 'Ingeniería Ambiental'],
            ['code' => '100-1', 'name' => 'Departamento de Posgrado'],

        ]);
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entity');
    }
}
