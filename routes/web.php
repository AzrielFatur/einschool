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

Route::get('/', 'HomeController@index');

// Admin
Route::get('/home', 'HomeController@index')->name('home');


// Data Management
Route::get('/data-management', 'DataManagement@index')->name('data-management.index');

// Class
Route::get('/data-management/class', 'GradeController@index')->name('class.index');
Route::get('/data-management/class/create', 'GradeController@create')->name('class.create');
Route::post('/data-management/class/store', 'GradeController@store')->name('class.store');
Route::get('/data-management/class/edit/{grade}', 'GradeController@edit')->name('class.edit');
Route::put('/data-management/class/update/{grade}', 'GradeController@update')->name('class.update');
Route::delete('/data-management/class/destroy/{grade}', 'GradeController@destroy')->name('class.destroy');
// Route::get('/json-subclassname', 'GradeController@subclassname');

// Teacher
Route::get('/data-management/teacher', 'TeacherController@index')->name('teacher.index');
Route::get('/data-management/teacher/create', 'TeacherController@create')->name('teacher.create');
Route::post('/data-management/teacher/store', 'TeacherController@store')->name('teacher.store');
Route::get('/data-management/teacher/show/{teacher}', 'TeacherController@show')->name('teacher.show');
Route::get('/data-management/teacher/edit/{teacher}', 'TeacherController@edit')->name('teacher.edit');
Route::put('/data-management/teacher/update/{teacher}', 'TeacherController@update')->name('teacher.update');
Route::delete('/data-management/teacher/destroy/{teacher}', 'TeacherController@destroy')->name('teacher.destroy');

// Student
Route::get('/data-management/student', 'StudentController@index')->name('student.index');
Route::get('/data-management/student/create', 'StudentController@create')->name('student.create');
Route::post('/data-management/student/store', 'StudentController@store')->name('student.store');
Route::get('/data-management/student/show/{student}', 'StudentController@show')->name('student.show');
Route::get('/data-management/student/edit/{student}', 'StudentController@edit')->name('student.edit');
Route::put('/data-management/student/update/{student}', 'StudentController@update')->name('student.update');
Route::delete('/data-management/student/destroy/{student}', 'StudentController@destroy')->name('student.destroy');


Auth::routes();

