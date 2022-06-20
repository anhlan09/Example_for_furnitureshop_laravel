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

//Route::get('/', function () {
//    return view('welcome');
//});
//
//Route::get('viewbook',function (){
//    return view('viewbook');
//});
//
//Route::get('nav',function (){
//    return view('master/master');
//});
//
//Route::get('view',function (){
//    return view('book.vAllbook');
//})->name('book.vAllbook');
//
//Route::get('new',function (){
//    return view('book.newBook');
//})->name('book.newBook');
//
//Route::get('edit',function (){
//    return view('book.editBook');
//})->name('book.editBook');
//
//Route::group(['prefix' => 'hi'], function (){
//    Route::get('', [
//        'uses' => 'lab2Controller@indexCL',
//        'as' => 'classes.index'
//    ]);
//
//    Route::get('new', [
//        'uses' => 'lab2Controller@newCL',
//        'as' => 'classes.new'
//    ]);
//
//    Route::post('new', [
//        'uses' => 'lab2Controller@storeCL',
//        'as' => 'classes.store'
//    ]);
//
//    Route::get('update/{id}',[
//        'uses' => 'lab2Controller@editC',
//        'as' => 'classes.edit'
//    ]);
//
//    Route::post('update/{id}',[
//        'uses' => 'lab2Controller@updateC',
//        'as' => 'classes.update'
//    ]);
//
//});
//
//Route::group(['prefix' => 'hello'], function (){
//    Route::get('', [
//        'uses' => 'lab2tController@indexT',
//        'as' => 'teacher.index'
//    ]);
//
//    Route::get('new',[
//        'uses' => 'lab2tController@newT',
//        'as' => 'teacher.new'
//    ]);
//
//    Route::post('new', [
//        'uses' => 'lab2tController@storeT',
//        'as' => 'teacher.store'
//    ]);
//
//    Route::get('update/{id}',[
//        'uses' => 'lab2tController@editT',
//        'as' => 'teacher.edit'
//    ]);
//
//    Route::post('update/{id}', [
//        'uses' => 'lab2tController@updateT',
//        'as' => 'teacher.update'
//    ]);
//});
//
//Route::group(['prefix' => 'chao'], function (){
//    Route::get('', [
//        'uses' => 'lab2sController@indexS',
//        'as' => 'students.index'
//    ]);
//
//    Route::get('new', [
//        'uses' => 'lab2sController@newS',
//        'as' => 'students.new'
//    ]);
//
//    Route::post('new', [
//        'uses' => 'lab2sController@storeS',
//        'as' => 'students.store'
//    ]);
//
//    Route::get('update/{id}',[
//        'uses' => 'lab2sController@editS',
//        'as' => 'students.edit'
//    ]);
//
//    Route::post('update/{id}',[
//        'uses' => 'lab2sController@updateS',
//        'as' => 'students.update'
//    ]);
//
//});

Route::group(['prefix' => 'classrepos'], function() {
    Route::get('',[
        'uses' => 'ClassControllerWithRepos@index',
        'as' => 'class.index'
    ]);

    Route::get('show/{id}', [
        'uses' => 'ClassControllerWithRepos@show',
        'as' => 'class.show'
    ]);

    Route::get('create',[
        'uses' => 'ClassControllerWithRepos@create',
        'as' => 'class.create'
    ]);
    Route::post('create',[
        'uses' => 'ClassControllerWithRepos@store',
        'as' => 'class.store'
    ]);
    Route::get('update/{id}',[
        'uses' => 'ClassControllerWithRepos@edit',
        'as' => 'class.edit'
    ]);

    Route::post('update/{id}',[
        'uses' => 'ClassControllerWithRepos@update',
        'as' => 'class.update'
    ]);
    Route::get('delete/{id}',[
        'uses' => 'ClassControllerWithRepos@confirm',
        'as' => 'class.confirm'
    ]);

    Route::post('delete/{id}',[
        'uses' => 'ClassControllerWithRepos@destroy',
        'as' => 'class.destroy'
    ]);
});

Route::group(['prefix' => 'teacherrepos'], function() {
    Route::get('',[
        'uses' => 'TeacherControllerWithRepos@index',
        'as' => 'teacher.index'
    ]);
    Route::get('show/{id}', [
        'uses' => 'TeacherControllerWithRepos@show',
        'as' => 'teacher.show'
    ]);
    Route::get('create',[
        'uses' => 'TeacherControllerWithRepos@create',
        'as' => 'teacher.create'
    ]);
    Route::post('create',[
        'uses' => 'TeacherControllerWithRepos@store',
        'as' => 'teacher.store'
    ]);
    Route::get('update/{id}',[
        'uses' => 'TeacherControllerWithRepos@edit',
        'as' => 'teacher.edit'
    ]);

    Route::post('update/{id}',[
        'uses' => 'TeacherControllerWithRepos@update',
        'as' => 'teacher.update'
    ]);
    Route::get('delete/{id}',[
        'uses' => 'TeacherControllerWithRepos@confirm',
        'as' => 'teacher.confirm'
    ]);

    Route::post('delete/{id}',[
        'uses' => 'TeacherControllerWithRepos@destroy',
        'as' => 'teacher.destroy'
    ]);
});

Route::group(['prefix' => 'studentrepos'], function() {
    Route::get('',[
        'uses' => 'StudentControllerWithRepos@index',
        'as' => 'student.index'
    ]);

    Route::get('show/{id}', [
        'uses' => 'StudentControllerWithRepos@show',
        'as' => 'student.show'
    ]);

    Route::get('create',[
        'uses' => 'StudentControllerWithRepos@create',
        'as' => 'student.create'
    ]);
    Route::post('create',[
        'uses' => 'StudentControllerWithRepos@store',
        'as' => 'student.store'
    ]);
    Route::get('update/{id}',[
        'uses' => 'StudentControllerWithRepos@edit',
        'as' => 'student.edit'
    ]);

    Route::post('update/{id}',[
        'uses' => 'StudentControllerWithRepos@update',
        'as' => 'student.update'
    ]);
    Route::get('delete/{id}',[
        'uses' => 'StudentControllerWithRepos@confirm',
        'as' => 'student.confirm'
    ]);

    Route::post('delete/{id}',[
        'uses' => 'StudentControllerWithRepos@destroy',
        'as' => 'student.destroy'
    ]);
});


