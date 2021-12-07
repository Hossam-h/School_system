<?php

use Illuminate\Support\Facades\Route;

use \App\Http\Controllers\Controller\Grades;

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

// Route::get('/', function () {
//     return view('empty');
// });


// routes/web.php
Auth::routes();

Route::group(['middleware' => ['guest']], function () {

        Route::get('/', function () {
            return view('auth.login');
        });
    });


Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth']
], function () {
    /** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/






    // Route::get('/home', function()
    // {
    // 	return View::make('empty');
    // });

    Route::group(['namespace' => 'Grades'], function () {
        Route::resource('Grades', 'GradeController');
    });


    Route::get('/dashboard', 'HomeController@index')->name('dashboard');
});

//sdkfjg jdfghsdfdfgtsdfgsjkhjklhkljkgjkhgjhk
/** OTHER PAGES THAT SHOULD NOT BE LOCALIZED **/
