<?php

use Illuminate\Support\Facades\Route;

use \App\Http\Controllers\Controller\Grades;
//use Livewire\Livewire;

//use \App\Http\Controllers\ClassroomController;
//use \App\Http\Controllers\classrooms\ConnactController;


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






    //=====================Grades========================
    Route::group(['namespace' => 'Grades'], function () {
        Route::resource('Grades', 'GradeController');
    });

    //=====================Classrooms========================
    Route::group(['namespace' => 'Classrooms'], function () {
        Route::resource('Classrooms', 'ClassroomController');
        Route::post('delete_all', 'ClassroomController@delete_all')->name('delete_all');
        Route::post('Filter_Classes', 'ClassroomController@Filter_Classes')->name('Filter_Classes');


    });

     //=====================Sections========================
     Route::group(['namespace' => 'Sections'], function () {
        Route::resource('Sections', 'SectionController');
        Route::get('/classes/{id}','SectionController@getclasses');
    });

    Route::group(['namespace'=>'Teacheres'],function(){
        Route::resource('teacher','TeacherController');
    });
     //=====================Parent========================

    Route::group(['namespace' => 'Myparent'], function () {
        Route::resource('Myparent', 'MyparentController');
        Route::get('/parenr/all', 'MyparentController@showAll')->name('showall');
        //Route::get('/classes/{id}','SectionController@getclasses');
    });

     //=====================Student=============================
    Route::group(['namespace' => 'Students'], function () {
        Route::resource('Students', 'StudentController');
        Route::get('Get_classerooms/{id}', 'StudentController@Get_classerooms');
        Route::get('Get_section/{id}', 'StudentController@Get_section');
        Route::get('get_attchment/{id}/{namefile}', 'StudentController@get_attchment');
        Route::get('show_Attach/{id}/{namefile}', 'StudentController@show_Attach');


    });


       //========================dashboard======================
    Route::get('/dashboard', 'HomeController@index')->name('dashboard');


    Route::get('/allparent', function(){
        return view('myParent.parentes');
    });
});

