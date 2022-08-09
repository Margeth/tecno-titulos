<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateAdminUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('admin_users', static function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email');
            $table->string('password');
            $table->rememberToken();

            $table->boolean('activated')->default(true);
            $table->boolean('forbidden')->default(false);
            $table->string('language', 2)->default('en');

            $table->softDeletes();
            $table->timestamps();

            $table->integer('ci')->nullable();
            $table->bigInteger('code')->unique();
            $table->string('gender')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('province')->nullable();

            $table->unique(['email', 'deleted_at', 'code']);
        });

        $connection = config('database.default');
        $driver = config("database.connections.{$connection}.driver");
        if ($driver === 'pgsql') {
            Schema::table('admin_users', static function (Blueprint $table) {
                DB::statement('CREATE UNIQUE INDEX admin_users_email_null_deleted_at ON admin_users (email) WHERE deleted_at IS NULL;');
            });
        }


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_users');
    }
}
