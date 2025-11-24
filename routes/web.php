<?php

use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\ErrorController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/course', [CourseController::class, 'index'])->middleware('verified')->name('course.index');
Route::get('/lesson', [LessonController::class, 'index'])->name('lesson.index');
Route::get('/courses', [CoursesController::class, 'index'])->name('courses.index');
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');

Route::get('/user/create', [UserController::class, 'create'])->middleware('guest')->name('user.create');
Route::post('/user', [UserController::class, 'store'])->middleware('guest')->name('user.store');

Route::resource('login', LoginController::class)->only([
  'index',
  'store',
]);

Route::controller(ForgotPasswordController::class)->name('forgot-password.')->prefix('forgot-password')->group(function () {
  Route::get('/', 'index')->name('index');
  Route::get('/{token}', 'edit')->name('edit');
  Route::post('/', 'store')->name('store');
  Route::put('/', 'update')->name('update');
})->middleware('guest');

Route::delete('/logout', [LoginController::class, 'destroy'])->name('login.destroy');
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');

Route::fallback([ErrorController::class, 'error404']);
