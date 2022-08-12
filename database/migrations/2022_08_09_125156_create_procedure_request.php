<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateProcedureRequest extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('procedure_request', function (Blueprint $table) {
            $table->id();
            $table->integer('no_request')->unique();
            $table->integer('id_academic_degree');
            $table->integer('id_request_state');
            $table->integer('user_student');
            $table->integer('user_transcriber');

            $table->foreign('id_academic_degree')->references('id')->on('academic_degree');
            $table->foreign('id_request_state')->references('id')->on('request_state');
            $table->foreign('user_student')->references('code')->on('admin_users');
            $table->foreign('user_transcriber')->references('code')->on('admin_users');
            $table->timestamps();
        });
        DB::table('procedure_request')->insert([
            ['no_request' => '21878', 'id_academic_degree' => '1', 'id_request_state' => '1', 'user_student' => '215454216', 'user_transcriber' => '2000147'],
            ['no_request' => '21871', 'id_academic_degree' => '1', 'id_request_state' => '2', 'user_student' => '216521302', 'user_transcriber' => '2000147'],
            ['no_request' => '21873', 'id_academic_degree' => '3', 'id_request_state' => '1', 'user_student' => '215487652', 'user_transcriber' => '2000147'],
            ['no_request' => '21875', 'id_academic_degree' => '6', 'id_request_state' => '3', 'user_student' => '201458751', 'user_transcriber' => '2000147'],
            ['no_request' => '21877', 'id_academic_degree' => '7', 'id_request_state' => '1', 'user_student' => '213554871', 'user_transcriber' => '2000147'],
            ['no_request' => '21879', 'id_academic_degree' => '8', 'id_request_state' => '2', 'user_student' => '215084874', 'user_transcriber' => '2000147'],
            ['no_request' => '21870', 'id_academic_degree' => '5', 'id_request_state' => '3', 'user_student' => '205184781', 'user_transcriber' => '2000147'],

        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('procedure_request');
    }
}
