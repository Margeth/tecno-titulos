<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QueryController;
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

Route::get('/query',function (){
    return view('query');
});

Route::post('/queryR',[QueryController::class ,'queryRes']);

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
        Route::prefix('procedure-requests')->name('procedure-requests/')->group(static function() {
            Route::get('/',                                             'ProcedureRequestController@index')->name('index');
            Route::get('/create',                                       'ProcedureRequestController@create')->name('create');
            Route::post('/',                                            'ProcedureRequestController@store')->name('store');
            Route::get('/{procedureRequest}/edit',                      'ProcedureRequestController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'ProcedureRequestController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{procedureRequest}',                          'ProcedureRequestController@update')->name('update');
            Route::delete('/{procedureRequest}',                        'ProcedureRequestController@destroy')->name('destroy');
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
        Route::prefix('minutes')->name('minutes/')->group(static function() {
            Route::get('/',                                             'MinuteController@index')->name('index');
            Route::get('/create',                                       'MinuteController@create')->name('create');
            Route::post('/',                                            'MinuteController@store')->name('store');
            Route::get('/{minute}/edit',                                'MinuteController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'MinuteController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{minute}',                                    'MinuteController@update')->name('update');
            Route::delete('/{minute}',                                  'MinuteController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('user-academic-degrees')->name('user-academic-degrees/')->group(static function() {
            Route::get('/',                                             'UserAcademicDegreeController@index')->name('index');
            Route::get('/create',                                       'UserAcademicDegreeController@create')->name('create');
            Route::post('/',                                            'UserAcademicDegreeController@store')->name('store');
            Route::get('/{userAcademicDegree}/edit',                    'UserAcademicDegreeController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'UserAcademicDegreeController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{userAcademicDegree}',                        'UserAcademicDegreeController@update')->name('update');
            Route::delete('/{userAcademicDegree}',                      'UserAcademicDegreeController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('signers')->name('signers/')->group(static function() {
            Route::get('/',                                             'SignerController@index')->name('index');
            Route::get('/create',                                       'SignerController@create')->name('create');
            Route::post('/',                                            'SignerController@store')->name('store');
            Route::get('/{signer}/edit',                                'SignerController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'SignerController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{signer}',                                    'SignerController@update')->name('update');
            Route::delete('/{signer}',                                  'SignerController@destroy')->name('destroy');
        });
    });
});


/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('stats')->name('stats/')->group(static function() {
            Route::get('/',                                             'StatsController@index')->name('index');
            Route::get('/create',                                       'StatsController@create')->name('create');
            Route::post('/',                                            'StatsController@store')->name('store');
            Route::get('/{stat}/edit',                                  'StatsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'StatsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{stat}',                                      'StatsController@update')->name('update');
            Route::delete('/{stat}',                                    'StatsController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('stats')->name('stats/')->group(static function() {
            Route::get('/',                                             'StatController@index')->name('index');
            Route::get('/create',                                       'StatController@create')->name('create');
            Route::post('/',                                            'StatController@store')->name('store');
            Route::get('/{stat}/edit',                                  'StatController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'StatController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{stat}',                                      'StatController@update')->name('update');
            Route::delete('/{stat}',                                    'StatController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('stats')->name('stats/')->group(static function() {
            Route::get('/',                                             'StatsController@index')->name('index');
            Route::get('/create',                                       'StatsController@create')->name('create');
            Route::post('/',                                            'StatsController@store')->name('store');
            Route::get('/{stat}/edit',                                  'StatsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'StatsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{stat}',                                      'StatsController@update')->name('update');
            Route::delete('/{stat}',                                    'StatsController@destroy')->name('destroy');
        });
    });
});