<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateTypeAcademicDegree extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_academic_degree', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });
        DB::table('type_academic_degree')->insert([
            ['name' => 'Titulo Provisión Nacional'],
            ['name' => 'Titulo Académico'],
            ['name' => 'Diplomado'],
            ['name' => 'Doctorado'],
            ['name' => 'Maestría'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('type_academic_degree');
    }
}
