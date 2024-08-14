<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Student\BooksController;
use App\Http\Controllers\Student\LowerUniformController;
use App\Http\Controllers\Student\UpperUniformController;
use App\Http\Controllers\Student\NotificationController;
use App\Http\Controllers\Student\PickUpController;
use App\Http\Controllers\Student\ProfileController;
use App\Http\Controllers\Student\ReservationController;
use App\Http\Controllers\Student\RsoController;
use App\Http\Controllers\Student\StudentController;
use App\Http\Controllers\Item\ItemBookController;
use App\Http\Controllers\Item\ItemLowerUniformController;
use App\Http\Controllers\Item\ItemUpperUniformController;
use App\Http\Controllers\Item\ItemrsoController;
use App\Http\Controllers\Admin\AdminController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//Student
Route::apiResource('students', StudentController::class);
Route::apiResource('books', BooksController::class);
Route::apiResource('lower-uniforms', LowerUniformController::class);
Route::apiResource('upper-uniforms', UpperUniformController::class);
Route::apiResource('notifications', NotificationController::class);
Route::apiResource('pick-ups', PickUpController::class);
Route::apiResource('profiles', ProfileController::class);
Route::apiResource('reservations', ReservationController::class);
Route::apiResource('rsos', RsoController::class);

//Item
Route::apiResource('item-books', ItemBookController::class);
Route::apiResource('item-lower-uniforms', ItemLowerUniformController::class);
Route::apiResource('item-upper-uniforms', ItemUpperUniformController::class);
Route::apiResource('item-rsos', ItemrsoController::class);

//Admin
Route::apiResource('admins', AdminController::class);