<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\CommentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::get('companies', [CompanyController::class, 'index'])->name('companies.index');
Route::get('companies/{company}', [CompanyController::class, 'show'])->name('companies.show');
Route::post('companies', [CompanyController::class, 'store'])->name('companies.store');
Route::put('companies/{company}', [CompanyController::class, 'update'])->name('companies.update');
Route::delete('companies/{company}', [CompanyController::class, 'destroy'])->name('companies.destroy');

Route::get('members', [MemberController::class, 'index'])->name('members.index');
Route::get('members/{member}', [MemberController::class, 'show'])->name('members.show');
Route::post('members', [MemberController::class, 'store'])->name('members.store');
Route::put('members/{member}', [MemberController::class, 'update'])->name('members.update');
Route::delete('members/{member}', [MemberController::class, 'destroy'])->name('members.destroy');

Route::get('comments', [CommentController::class, 'index'])->name('comments.index');
Route::get('comments/{comment}', [CommentController::class, 'show'])->name('comments.show');
Route::post('comments', [CommentController::class, 'store'])->name('comments.store');
Route::put('comments/{comment}', [CommentController::class, 'update'])->name('comments.update');
Route::delete('comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');




