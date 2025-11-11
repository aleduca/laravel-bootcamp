<?php

use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/course', [CourseController::class, 'index'])->name('course.index');
Route::get('/lesson', [LessonController::class, 'index'])->name('lesson.index');
Route::get('/courses', [CoursesController::class, 'index'])->name('courses.index');
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::resource('login', LoginController::class)->only([
  'index',
  'store',
  'show'
]);
Route::delete('/logout', [LoginController::class, 'destroy'])->name('login.destroy');
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
