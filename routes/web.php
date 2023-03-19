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

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('validate_user', [App\Http\Controllers\HomeController::class, 'validate_user'])->name('validate_user');

Route::get('quiz', [\App\Http\Controllers\QuizController::class, 'index'])->name('quiz.index');
Route::get('compile_result/{result_id}', [\App\Http\Controllers\QuizController::class, 'compile_result'])->name('quiz.compile_result');
Route::get('logout', [\App\Http\Controllers\QuizController::class, 'logout'])->name('quiz.logout');
Route::get('result', [\App\Http\Controllers\QuizController::class, 'result'])->name('quiz.result');
Route::get('view_result/{result_id}', [\App\Http\Controllers\QuizController::class, 'single_result'])->name('quiz.view_result');
Route::post('save_answer', [App\Http\Controllers\QuizController::class, 'save_answer'])->name('save_answer');
Route::post('skip_question', [App\Http\Controllers\QuizController::class, 'skip_question'])->name('skip_question');
Route::post('getnext', [App\Http\Controllers\QuizController::class, 'getnext'])->name('getnext');

