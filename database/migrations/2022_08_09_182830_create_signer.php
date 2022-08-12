<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateSigner extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('signer', function (Blueprint $table) {
            $table->id();
            $table->integer('id_minute');
            $table->string('code_user_academic_degre')->nullable();
            $table->bigInteger('code');
            $table->integer('id_step');
            $table->boolean('is_signed')->default(false);
            $table->timestamps();

            $table->foreign('id_minute')->references('id')->on('minute');
            $table->foreign('code_user_academic_degre')->references('code_academic_degree')->on('user_academic_degree');
            $table->foreign('code')->references('code')->on('admin_users');
            $table->foreign('id_step')->references('id')->on('step_signer');

        });
        DB::table('signer')->insert([
            ['id_minute' => 1,'code_user_academic_degre' => '1125-5104-4120','code' => 200014,'id_step' => 1,'is_signed' => True],
            ['id_minute' => 1,'code_user_academic_degre' => '1125-5104-4120','code' => 200015,'id_step' => 1,'is_signed' => True],
            ['id_minute' => 2,'code_user_academic_degre' => '1125-5104-4121','code' => 200014,'id_step' => 1,'is_signed' => True],
            ['id_minute' => 2,'code_user_academic_degre' => '1125-5104-4121','code' => 200015,'id_step' => 1,'is_signed' => True],
            ['id_minute' => 2,'code_user_academic_degre' => '1125-5104-4121','code' => 200014,'id_step' => 1,'is_signed' => True],
            ['id_minute' => 3,'code_user_academic_degre' => '1125-5104-4122','code' => 200014,'id_step' => 1,'is_signed' => True],
            ['id_minute' => 3,'code_user_academic_degre' => '1125-5104-4122','code' => 200016,'id_step' => 1,'is_signed' => True],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('signer');
    }
}
