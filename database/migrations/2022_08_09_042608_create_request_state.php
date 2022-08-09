<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateRequestState extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_state', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('message');

        });

        DB::table('request_state')->insert(
            [['name' => 'Aprobado', 'message' => 'Su solicitud ha sido aprobada. Procederá a pasar al Sistema de Folio'],
            ['name' => 'Pendiente', 'message' => 'Su solicitud está en proceso.'],
            ['name' => 'Cancelado', 'message' => 'Su solicitud ha sido cancelada. Vuelva al departamento de titulos para averiguar el problema']]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('request_state');
    }
}
