<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('admin-users')->name('admin-users/')->group(static function() {
            Route::get('/',                                             'AdminUsersController@index')->name('index');
            Route::get('/create',                                       'AdminUsersController@create')->name('create');
            Route::post('/',                                            'AdminUsersController@store')->name('store');
            Route::get('/{adminUser}/impersonal-login',                 'AdminUsersController@impersonalLogin')->name('impersonal-login');
            Route::get('/{adminUser}/edit',                             'AdminUsersController@edit')->name('edit');
            Route::post('/{adminUser}',                                 'AdminUsersController@update')->name('update');
            Route::delete('/{adminUser}',                               'AdminUsersController@destroy')->name('destroy');
            Route::get('/{adminUser}/resend-activation',                'AdminUsersController@resendActivationEmail')->name('resendActivationEmail');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::get('/profile',                                      'ProfileController@editProfile')->name('edit-profile');
        Route::post('/profile',                                     'ProfileController@updateProfile')->name('update-profile');
        Route::get('/password',                                     'ProfileController@editPassword')->name('edit-password');
        Route::post('/password',                                    'ProfileController@updatePassword')->name('update-password');
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('posts')->name('posts/')->group(static function() {
            Route::get('/',                                             'PostsController@index')->name('index');
            Route::get('/create',                                       'PostsController@create')->name('create');
            Route::post('/',                                            'PostsController@store')->name('store');
            Route::get('/{post}/edit',                                  'PostsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'PostsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{post}',                                      'PostsController@update')->name('update');
            Route::delete('/{post}',                                    'PostsController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('roles')->name('roles/')->group(static function() {
            Route::get('/',                                             'RolesController@index')->name('index');
            Route::get('/create',                                       'RolesController@create')->name('create');
            Route::post('/',                                            'RolesController@store')->name('store');
            Route::get('/{role}/edit',                                  'RolesController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'RolesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{role}',                                      'RolesController@update')->name('update');
            Route::delete('/{role}',                                    'RolesController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('permissions')->name('permissions/')->group(static function() {
            Route::get('/',                                             'PermissionsController@index')->name('index');
            Route::get('/create',                                       'PermissionsController@create')->name('create');
            Route::post('/',                                            'PermissionsController@store')->name('store');
            Route::get('/{permission}/edit',                            'PermissionsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'PermissionsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{permission}',                                'PermissionsController@update')->name('update');
            Route::delete('/{permission}',                              'PermissionsController@destroy')->name('destroy');
        });
    });
});


/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('role-has-permissions')->name('role-has-permissions/')->group(static function() {
            Route::get('/',                                             'RoleHasPermissionsController@index')->name('index');
            Route::get('/create',                                       'RoleHasPermissionsController@create')->name('create');
            Route::post('/',                                            'RoleHasPermissionsController@store')->name('store');
            Route::get('/{roleHasPermission}/edit',                     'RoleHasPermissionsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'RoleHasPermissionsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{roleHasPermission}',                         'RoleHasPermissionsController@update')->name('update');
            Route::delete('/{roleHasPermission}',                       'RoleHasPermissionsController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('type-academic-degrees')->name('type-academic-degrees/')->group(static function() {
            Route::get('/',                                             'TypeAcademicDegreeController@index')->name('index');
            Route::get('/create',                                       'TypeAcademicDegreeController@create')->name('create');
            Route::post('/',                                            'TypeAcademicDegreeController@store')->name('store');
            Route::get('/{typeAcademicDegree}/edit',                    'TypeAcademicDegreeController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'TypeAcademicDegreeController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{typeAcademicDegree}',                        'TypeAcademicDegreeController@update')->name('update');
            Route::delete('/{typeAcademicDegree}',                      'TypeAcademicDegreeController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('entities')->name('entities/')->group(static function() {
            Route::get('/',                                             'EntityController@index')->name('index');
            Route::get('/create',                                       'EntityController@create')->name('create');
            Route::post('/',                                            'EntityController@store')->name('store');
            Route::get('/{entity}/edit',                                'EntityController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'EntityController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{entity}',                                    'EntityController@update')->name('update');
            Route::delete('/{entity}',                                  'EntityController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('academic-degrees')->name('academic-degrees/')->group(static function() {
            Route::get('/',                                             'AcademicDegreeController@index')->name('index');
            Route::get('/create',                                       'AcademicDegreeController@create')->name('create');
            Route::post('/',                                            'AcademicDegreeController@store')->name('store');
            Route::get('/{academicDegree}/edit',                        'AcademicDegreeController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'AcademicDegreeController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{academicDegree}',                            'AcademicDegreeController@update')->name('update');
            Route::delete('/{academicDegree}',                          'AcademicDegreeController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('requirements')->name('requirements/')->group(static function() {
            Route::get('/',                                             'RequirementController@index')->name('index');
            Route::get('/create',                                       'RequirementController@create')->name('create');
            Route::post('/',                                            'RequirementController@store')->name('store');
            Route::get('/{requirement}/edit',                           'RequirementController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'RequirementController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{requirement}',                               'RequirementController@update')->name('update');
            Route::delete('/{requirement}',                             'RequirementController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('academic-degree-requirements')->name('academic-degree-requirements/')->group(static function() {
            Route::get('/',                                             'AcademicDegreeRequirementController@index')->name('index');
            Route::get('/create',                                       'AcademicDegreeRequirementController@create')->name('create');
            Route::post('/',                                            'AcademicDegreeRequirementController@store')->name('store');
            Route::get('/{academicDegreeRequirement}/edit',             'AcademicDegreeRequirementController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'AcademicDegreeRequirementController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{academicDegreeRequirement}',                 'AcademicDegreeRequirementController@update')->name('update');
            Route::delete('/{academicDegreeRequirement}',               'AcademicDegreeRequirementController@destroy')->name('destroy');
        });
    });
});