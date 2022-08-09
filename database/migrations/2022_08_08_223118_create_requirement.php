<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateRequirement extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requirement', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('quantity');
            $table->string('observation');
        });
        DB::table('requirement')->insert([
            ['name' => 'Fotocopia de CI', 'quantity' => 3,'observation' => 'Blanco y Negro'],
            ['name' => 'Fotocopia de Titulo de Bachiller', 'quantity' => 2,'observation' => 'Legalizado'],
            ['name' => 'Fotocopia Certificado de Nacimiento', 'quantity' => 3,'observation' => 'Ninguna'],
            ['name' => 'Formulario de corrección de Nombre', 'quantity' => 1,'observation' => 'Ninguna'],
            ['name' => 'Acta de Graduacion legalizada', 'quantity' => 2,'observation' => 'Ninguna'],
            ['name' => 'Certificado No Deudor', 'quantity' => 1,'observation' => 'Ninguna'],
            ['name' => 'Copia de formulario de validacion', 'quantity' => 1,'observation' => 'Ninguna'],

        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('requirement');
    }
}
