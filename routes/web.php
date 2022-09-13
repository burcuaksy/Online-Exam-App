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
Route::namespace('App\Http\Controllers')->prefix('')->group(function () {

Route::get('/', function () {
    return view('auth/login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/exam/exam-result', 'ExamListController@result')->middleware(['auth'])->name('examResult');
Route::get('/exam/exam-result/{id}', 'ExamListController@resultexam')->middleware(['auth'])->name('examResultwith');
Route::post('/exam/point/{id}/{user}', 'ExamListController@pointexam')->middleware(['auth'])->name('examGetpoint');
Route::get('/delete/exam/{id}/{use}', 'ExamListController@examdelete')->middleware(['auth'])->name('examDelete');
Route::get('/edit/exam/{id}', 'ExamListController@editexam')->middleware(['auth'])->name('examEdit');
Route::get('/solve/exam/{id}', 'ExamListController@solveexam')->middleware(['auth'])->name('examSolve');

Route::get('/exam/{id}', 'ExamListController@examdetail')->middleware(['auth'])->name('examGetdetail');
Route::post('/exam/save/{id}', 'ExamListController@examsave')->name('examGetsave');
Route::post('/exam/solve/{id}/{user}', 'ExamListController@examsolvesave')->name('examGetsolve');

Route::get('/users', 'UserController@index')->middleware(['auth'])->name('userslist');

Route::get('/{name}/{question}', 'ExamListController@index')->middleware(['auth'])->name('examGetlist');


Route::get('/add-students', function () {
    return view('system/addstudent');
})->middleware(['auth'])->name('addstudent');

Route::get('/add-exam', function () {
    return view('system/createexam');
})->middleware(['auth'])->name('createexam');

Route::get('/exam-list', 'ExamListController@examlist')->middleware(['auth'])->name('examlist');

require __DIR__.'/auth.php';

});