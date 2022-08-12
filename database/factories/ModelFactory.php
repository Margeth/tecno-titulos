<?php

/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Brackets\AdminAuth\Models\AdminUser::class, function (Faker\Generator $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->email,
        'password' => bcrypt($faker->password),
        'remember_token' => null,
        'activated' => true,
        'forbidden' => $faker->boolean(),
        'language' => 'en',
        'deleted_at' => null,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        'last_login_at' => $faker->dateTime,
        
    ];
});/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Post::class, static function (Faker\Generator $faker) {
    return [
        'title' => $faker->sentence,
        'slug' => $faker->unique()->slug,
        'perex' => $faker->text(),
        'published_at' => $faker->date(),
        'enabled' => $faker->boolean(),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Role::class, static function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,
        'guard_name' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Permission::class, static function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,
        'guard_name' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\User::class, static function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,
        'ci' => $faker->sentence,
        'phone' => $faker->sentence,
        'address' => $faker->sentence,
        'date_bird' => $faker->date(),
        'gender' => $faker->sentence,
        'country' => $faker->sentence,
        'city' => $faker->sentence,
        'province' => $faker->sentence,
        'email' => $faker->email,
        'email_verified_at' => $faker->dateTime,
        'password' => bcrypt($faker->password),
        'remember_token' => null,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\RoleHasPermission::class, static function (Faker\Generator $faker) {
    return [
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\RoleHasPermission::class, static function (Faker\Generator $faker) {
    return [
        'permission_id' => $faker->sentence,
        'role_id' => $faker->sentence,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\TypeAcademicDegree::class, static function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Entity::class, static function (Faker\Generator $faker) {
    return [
        'code' => $faker->sentence,
        'name' => $faker->firstName,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\AcademicDegree::class, static function (Faker\Generator $faker) {
    return [
        'id_entity' => $faker->randomNumber(5),
        'id_type' => $faker->randomNumber(5),
        'name' => $faker->firstName,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Requirement::class, static function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,
        'quantity' => $faker->randomNumber(5),
        'observation' => $faker->sentence,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\AcademicDegreeRequirement::class, static function (Faker\Generator $faker) {
    return [
        'id_type_academic_degree' => $faker->randomNumber(5),
        'id_requirement' => $faker->randomNumber(5),
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Brackets\AdminAuth\Models\AdminUser::class, function (Faker\Generator $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'ci' => $faker->randomNumber(5),
        'code' => $faker->randomNumber(5),
        'gender' => $faker->sentence,
        'date_of_birth' => $faker->date(),
        'country' => $faker->sentence,
        'city' => $faker->sentence,
        'province' => $faker->sentence,
        'email' => $faker->email,
        'password' => bcrypt($faker->password),
        'remember_token' => null,
        'activated' => true,
        'forbidden' => $faker->boolean(),
        'language' => 'en',
        'deleted_at' => null,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        'last_login_at' => $faker->dateTime,
        
    ];
});/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Brackets\AdminAuth\Models\AdminUser::class, function (Faker\Generator $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'ci' => $faker->randomNumber(5),
        'code' => $faker->sentence,
        'gender' => $faker->sentence,
        'date_of_birth' => $faker->date(),
        'country' => $faker->sentence,
        'city' => $faker->sentence,
        'province' => $faker->sentence,
        'email' => $faker->email,
        'password' => bcrypt($faker->password),
        'remember_token' => null,
        'activated' => true,
        'forbidden' => $faker->boolean(),
        'language' => 'en',
        'deleted_at' => null,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        'last_login_at' => $faker->dateTime,
        
    ];
});/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Brackets\AdminAuth\Models\AdminUser::class, function (Faker\Generator $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->email,
        'password' => bcrypt($faker->password),
        'remember_token' => null,
        'activated' => true,
        'forbidden' => $faker->boolean(),
        'language' => 'en',
        'deleted_at' => null,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        'ci' => $faker->randomNumber(5),
        'code' => $faker->sentence,
        'gender' => $faker->sentence,
        'date_of_birth' => $faker->date(),
        'country' => $faker->sentence,
        'city' => $faker->sentence,
        'province' => $faker->sentence,
        'last_login_at' => $faker->dateTime,
        
    ];
});/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Brackets\AdminAuth\Models\AdminUser::class, function (Faker\Generator $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->email,
        'password' => bcrypt($faker->password),
        'remember_token' => null,
        'activated' => true,
        'forbidden' => $faker->boolean(),
        'language' => 'en',
        'deleted_at' => null,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        'ci' => $faker->randomNumber(5),
        'code' => $faker->sentence,
        'gender' => $faker->sentence,
        'date_of_birth' => $faker->date(),
        'country' => $faker->sentence,
        'city' => $faker->sentence,
        'province' => $faker->sentence,
        'last_login_at' => $faker->dateTime,
        
    ];
});/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\ProcedureRequest::class, static function (Faker\Generator $faker) {
    return [
        'no_request' => $faker->randomNumber(5),
        'id_academic_degree' => $faker->randomNumber(5),
        'id_request_state' => $faker->randomNumber(5),
        'user_student' => $faker->randomNumber(5),
        'user_transcriber' => $faker->randomNumber(5),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\AcademicDegree::class, static function (Faker\Generator $faker) {
    return [
        'id_entity' => $faker->sentence,
        'id_type' => $faker->randomNumber(5),
        'name' => $faker->firstName,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Minute::class, static function (Faker\Generator $faker) {
    return [
        'no_request' => $faker->randomNumber(5),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\UserAcademicDegree::class, static function (Faker\Generator $faker) {
    return [
        'no_request' => $faker->randomNumber(5),
        'code_academic_degree' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Signer::class, static function (Faker\Generator $faker) {
    return [
        'id_minute' => $faker->randomNumber(5),
        'code_user_academic_degre' => $faker->sentence,
        'code' => $faker->sentence,
        'id_step' => $faker->randomNumber(5),
        'is_signed' => $faker->boolean(),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Stat::class, static function (Faker\Generator $faker) {
    return [
        'page_name' => $faker->sentence,
        'count' => $faker->randomNumber(5),
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Stat::class, static function (Faker\Generator $faker) {
    return [
        
        
    ];
});
