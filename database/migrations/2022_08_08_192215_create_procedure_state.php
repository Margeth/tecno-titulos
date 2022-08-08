<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateProcedureState extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('procedure_state', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('message');
        });

        DB::table('procedure_state')->insert([
            ['name' => 'Aprobado', 'message' => 'Los requisitos han sido verificados'],
            ['name' => 'Pendiente', 'message' => 'Su solicitud está en proceso de verificación'],
            ['name' => 'Rechazado', 'message' => 'Su solicitud ha sido rechazada. Por favor,diríjase al departamento de títulos'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('procedure_state');
    }
}
