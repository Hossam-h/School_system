<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| teacher Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//==============================Translate all pages============================
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth:teacher']
    ],
    function () {

        //==============================dashboard============================
        Route::get('/teacherDash', function () {

            $ids = App\Models\Teacher::find(Auth::user()->id)->sections()->pluck('section_id');
            $section_count = App\Models\Teacher::find(Auth::user()->id)->sections()->pluck('section_id')->count();
            $st_count = App\Models\Student::whereIn('section_id', $ids)->count();
            return view('Teachers.dashboard', compact('section_count', 'st_count'));

        });


        Route::group(['namespace' => 'Teachers\dashboard'], function () {
            Route::resource('students', 'StudentController');
            Route::get('sections', 'StudentController@sections')->name('sections');
            Route::post('attendance','StudentController@attendance')->name('attendance');
           Route::post('edit_attendance','StudentController@editAttendance')->name('attendance.edit');


        });


        Route::get('/personal', function () {
            return 'ok';
        })->name('person');
    }
);
