<?php

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/contact_us', 'HomeController@contact_us')->name('contact_us');
Route::get('/user/credential', 'HomeController@user_credential')->name('user_credential');

//shurjopay-payment-route
Route::get('/shurjopay', 'PaymentController@index')->name('payment.index');
Route::post('/shurjopay', 'PaymentController@post')->name('payment.post');

//payment success
Route::get('/get', 'PaymentController@paymentsuccess')->name('success.view');
//post
Route::post('/status/post', 'PaymentController@paymentstatus')->name('status.view');

//admitcard
Route::get('/admit/{id}', 'PaymentController@admit')->name('admit.index');

Route::get('student/exam', 'ExamController@index')->name('exam.index');
Route::get('student/start/exam', 'ExamController@startExam')->name('exam.start.exam');
Route::post('student/store/exam', 'ExamController@store')->name('store.exam');
Route::get('student/result/{student_id}', 'ExamController@result')->name('student.result');


//demo exam
Route::get('student/demo/exam', 'DemoExamController@index')->name('demo.exam.index');
Route::get('student/start/demo/exam', 'DemoExamController@startExam')->name('demo.exam.start.exam');
Route::post('student/store/demo/exam', 'DemoExamController@store')->name('demo.store.exam');



//admin

Route::get('/admin', 'AdminController@index')->name('admin.index');
//admit
Route::get('/admin/admit/{id}', 'AdminController@admin_admit')->name('admin.admit');
//student list
Route::get('/admin/student_list', 'AdminController@student_list')->name('admin.student_list');
Route::get('/admin/student/syncTable', 'AdminController@studentSyncTable')->name('admin.student.synctable');
//result
Route::get('/admin/result/synctable', 'AdminController@result_syncTable')->name('result.syntacble');
Route::get('/admin/result', 'AdminController@result')->name('admin.result');
Route::post('/admin/publish/result/', 'AdminController@publish_result')->name('admin.publish.result');
//question
Route::get('/admin/set/question', 'QuestionController@index')->name('admin.set_question');
Route::get('/admin/get/question/class/{class}', 'QuestionController@show')->name('admin.class.get_question');
Route::get('/admin/destory/question/{question}', 'QuestionController@destroy')->name('admin.class.destroy_question');
Route::post('/admin/store/question', 'QuestionController@store')->name('admin.store_question');
Route::post('/admin/update/question/{id}', 'QuestionController@update')->name('admin.update_question');
Route::get('/admin/edit/question/{id}', 'QuestionController@edit')->name('admin.ediit_question');

Route::get('admin/exam/setting', 'ExamsettingsController@index')->name('admin.exam.setting');
Route::post('/admin/exam/setting/store', 'ExamsettingsController@store')->name('admin.exam.setting.store');
Route::get('/admin/exam/setting/list', 'ExamsettingsController@list')->name('admin.exam.setting.list');
Route::get('/admin/exam/setting/{examsettings}', 'ExamsettingsController@show')->name('admin.exam.setting.show');
Route::get('/admin/exam/setting/delete/{examsettings}', 'ExamsettingsController@destroy')->name('admin.exam.setting.destroy');

//anwer exam

