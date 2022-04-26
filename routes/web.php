<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

//Define('PAGINATION_COUNT', 10);

//Auth::routes();

/* Route::group(['middleware' => 'guest'],function () {
   
    Route::get('/', function()
    {
        return view('auth.login');
    }); 
}); */

Route::get('/', 'HomeController@index')->name('selection');

Route::group(['namespace' => 'Auth',
              'prefix' => LaravelLocalization::setLocale(),
              'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
             ] , function(){
    
    Route::get('/login/{type}','LoginController@loginForm')->middleware('guest')->name('login.show');

    Route::post('/login','LoginController@login')->name('login');
    
    Route::get('/logout/{type}','LoginController@logout')->name('logout');
});

Route::group(['prefix' => LaravelLocalization::setLocale(),
              'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth' ]
             ], function(){ 

       Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');
        
      
       Route::group(['namespace' => 'admin', 'prefix' => 'admin'],function () {
        /* Route Grades */
            Route::resource('/grades', 'GradesController');

        /* Route ClassRooms */
            Route::resource('/classrooms', 'ClassRoomsController');
            Route::post('/delete/all', 'ClassRoomsController@delete')->name('delete_all');
            Route::get('/fillter_classes/{id}', 'ClassRoomsController@fillterClasses');

            /* Route sections */
            Route::resource('/sections', 'SectionsController');
            Route::get('/classes/{id}', 'SectionsController@getClasses')->name('classes');

            /* Route teachers */
            Route::resource('/teachers', 'TeacherController');

                /* Route students */
             Route::resource('/students', 'StudentController');
             Route::get('/Get_classrooms/{id}','StudentController@Get_classes');
             Route::get('/Get_sections/{id}','StudentController@Get_sections');
             Route::post('/upload_photos', 'StudentController@uploadAttachments')->name('upload_attachment');
             Route::get('/Download_photos/{studentsname}/{filename}', 'StudentController@downloadAttachment')->name('Download_photos');
             Route::delete('delete_attachment', 'StudentController@deleteAttachment')->name('delete_attachment');


             /* Route promotion */
             Route::resource('/promotion', 'PromotionController');

              /* Route Graduate */
              Route::resource('/graduate', 'GraduateController');

              /* Route Fees */
              Route::resource('/fees', 'FeesController');

               /* Route FeesInovice */
               Route::resource('/feesInovice', 'FeesInvoiceController');

               /* Route receipt_students */
               Route::resource('/receipt_students', 'ReceiptStudentsController');

               /* Route processingFees */
               Route::resource('/processingFees', 'ProcessingFeesController');
               
               /* Route payment_students */
               Route::resource('/payment_students', 'PaymentStudentController');

                /* Route attendances */
                Route::resource('/attendances', 'AttendanceController');

                /* Route subjects */
                Route::resource('/subjects', 'SubjectController');

                /* Route exams */
                Route::resource('/exams', 'ExamsController');
                

                /* Route quizzes */
                Route::resource('/quizzes', 'QuizzesController');

                
                /* Route Questions */
                Route::resource('/questions', 'QuestionsController');

                /* Route online_class */
                Route::resource('/online_class', 'OnlineClassController');
                Route::get('offline_class','OnlineClassController@IntegrateCreate')->name('offline_create');
                Route::post('offline_class','OnlineClassController@IntegrateStore')->name('offline_store');

                 /* Route library */
                 Route::resource('/library', 'LibraryController');
                 Route::get('/Download/{filename}', 'LibraryController@download')->name('Download_Attaches');

                  /* Route setting */
                Route::resource('/settings', 'SettingController');

       });//End Of Namespace Admin

      /* Route AddParent */
      Route::view('/admin/add_parent', 'livewire.show_form');
     


    
    });



/** OTHER PAGES THAT SHOULD NOT BE LOCALIZED **/

