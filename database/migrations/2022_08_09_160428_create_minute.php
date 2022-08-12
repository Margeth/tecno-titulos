<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateMinute extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('minute', function (Blueprint $table) {
            $table->id();
            $table->integer('no_request');
            $table->timestamps();
            $table->foreign('no_request')->references('no_request')->on('procedure_request');
        });
        DB::table('minute')->insert([
            ['no_request' => '21878'],
            ['no_request' => '21871'],
            ['no_request' => '21873'],
            ['no_request' => '21877'],
            ['no_request' => '21879'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('minute');
    }
}
