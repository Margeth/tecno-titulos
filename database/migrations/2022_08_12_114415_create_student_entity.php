<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentEntity extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_entity', function (Blueprint $table) {
            $table->id();
            $table->string('code_entity');
            $table->bigInteger('code');

            $table->foreign('code_entity')->references('code')->on('entity');
            $table->foreign('code')->references('code')->on('admin_users');
        });

        DB::table('student_entity')->insert([
            ['code_entity' => '187-4', 'code' => '215454216'],
            ['code_entity' => '187-4', 'code' => '216521302'],
            ['code_entity' => '187-3', 'code' => '215487652'],
            ['code_entity' => '187-5', 'code' => '201458751'],
            ['code_entity' => '122-2', 'code' => '213554871'],
            ['code_entity' => '122-3', 'code' => '215084874'],
            ['code_entity' => '100-1', 'code' => '205184781'],

        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_entity');
    }
}
