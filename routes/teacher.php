<?php

use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
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
    ], function () {

    //==============================dashboard============================

   

    Route::get('/teacher/dashboard', function () {
        $ids = Teacher::findOrFail(auth()->guard('teacher')->user()->id)->sections()->pluck('section_id');
        $CountSection =  $ids->count();
        $CountStudent =  Student::whereIn('section_id', $ids)->get(); 
        
        return view('dashboard.Teachers.Dashboard.dashboard',compact('CountSection','CountStudent'));
    });
    Route::group(['namespace' => 'Teacher'], function()
    {
        Route::get('students','StudentController@index')->name('yourStudents');
        Route::get('sections','StudentController@section')->name('yourSection');
        Route::post('attendances','StudentController@store')->name('studentAttendance');
    
    });
    
});