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
use App\Http\Controllers\EmailVerifyController;
use App\Http\Controllers\CommentController;

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/course/{course:slug}', [CourseController::class, 'show'])->name('course.show');
Route::get('/course/{course:slug}/lesson/{lesson:slug}', [LessonController::class, 'show'])
->middleware('can:access,course,lesson')->name('lesson.show');
Route::get('/courses', [CoursesController::class, 'index'])->name('courses.index');
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');

Route::get('/user/create', [UserController::class, 'create'])->middleware('guest')->name('user.create');
Route::post('/user', [UserController::class, 'store'])->middleware('guest')->name('user.store');

Route::get('/email/verify', [EmailVerifyController::class, 'index'])->middleware('auth')->name('verification.notice');
Route::post('/email/verification-notification', [EmailVerifyController::class, 'send'])->middleware('auth')->name('verification.send');
Route::get('/email/verify/{id}/{hash}', [EmailVerifyController::class, 'verify'])->middleware(['auth', 'signed'])->name('verification.verify');

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

Route::post('/comment/{lesson}', [CommentController::class, 'store'])->name('comment.store');

Route::delete('/logout', [LoginController::class, 'destroy'])->name('login.destroy');
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');

Route::fallback([ErrorController::class, 'error404']);
