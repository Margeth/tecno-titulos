<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateStepSigner extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('step_signer', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });
        DB::table('step_signer')->insert([
            ['name' => 'Sistema de Folio'],
            ['name' => 'Decanatura'],
            ['name' => 'Rectorado'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('step_signer');
    }
}
