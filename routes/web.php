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
Auth::routes(['verify'=>true]);



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
        Route::resource('Promotion', 'PromotionController');

        // studentAttend
        Route::resource('studentAttend', 'StudentAttendeController');


        // studentpayment
         Route::resource('Payment_students', 'PaymentStudentController');

         //ProcessingFees;
         Route::resource('ProcessingFess', 'ProcessingFeesController');
         //Reciept
        Route::resource('Reciept', 'ReceiptStudentController');
         // feeinvoice
        Route::resource('Feeinvo', 'FeeInvoiceController');
         // StAcount
        Route::resource('StAcount', 'StudentAcounteController');

        Route::resource('Graduate', 'GraduatedController');
        Route::get('Get_classerooms/{id}', 'StudentController@Get_classerooms');
        Route::get('Get_section/{id}', 'StudentController@Get_section');
        Route::get('download_attchment/{id}/{namefile}', 'StudentController@download_attchment');
        Route::get('show_Attach/{id}/{namefile}', 'StudentController@show_Attach');
        Route::delete('del_attchment/{id}/{namefile}', 'StudentController@del_attchment');
        Route::post ('upload_attachment','StudentController@upload_attachment');

    });

    //========================= fees =============================

    Route::group(['namespace' => 'Fees'],function () {
        Route::resource('Fees','FeeController');
    });

    //========================= Fund =============================
        Route::group(['namespace' => 'Fund'], function() {

             Route::resource('fundacounts','FundAccountController');
        });
    //========================dashboard======================
    Route::get('/dashboard', 'HomeController@index')->name('dashboard');


    Route::get('/allparent', function(){
        return view('myParent.parentes');
    });
});

