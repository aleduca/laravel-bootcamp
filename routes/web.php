<?php

use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\EmailVerifyController;
use App\Http\Controllers\ErrorController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/course/{course:slug}', [CourseController::class, 'show'])->name('course.show');
Route::get('/course/{course:slug}/lesson/{lesson:slug}', [LessonController::class, 'show'])
	->middleware('can:access,course,lesson')->name('lesson.show');
Route::get('/courses', [CoursesController::class, 'index'])->name('courses.index');
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');

Route::controller(UserController::class)->name('user.')->prefix('user')->group(function () {
	Route::get('/create', 'create')->middleware('guest')->name('create');
	Route::post('/', 'store')->middleware('guest')->name('store');
	Route::put('/{user}', 'update')->middleware('auth')->name('update')->middleware('throttle:update-user');
});

Route::get('/email/verify', [EmailVerifyController::class, 'index'])->middleware('auth')->name('verification.notice');
Route::post('/email/verification-notification', [EmailVerifyController::class, 'send'])->middleware('auth')->name('verification.send');
Route::get('/email/verify/{id}/{hash}', [EmailVerifyController::class, 'verify'])->middleware(['auth', 'signed'])->name('verification.verify');

Route::resource('login', LoginController::class)->only([
	'index',
	'store',
]);

Route::middleware('guest')->controller(ForgotPasswordController::class)->name('forgot-password.')->prefix('forgot-password')->group(function () {
	Route::get('/', 'index')->name('index');
	Route::get('/{token}', 'edit')->name('edit');
	Route::post('/', 'store')->name('store');
	Route::put('/', 'update')->name('update');
});

Route::middleware('auth')->controller(ProfileController::class)->name('profile.')->prefix('profile')->group(function () {
	Route::get('/edit', 'edit')->name('edit');
	Route::post('/store', 'store')->name('store');
	Route::put('/update/{profile}', 'update')->name('update')->middleware('can:update,profile', 'throttle:update-profile');
	Route::put('/avatar/{profile}', 'avatar')->name('avatar')->middleware('can:update,profile', 'throttle:update-avatar');
});

Route::post('/comment/reply', [ReplyController::class, 'store'])->name('reply.store');
Route::post('/comment/{id}', [CommentController::class, 'store'])->name('comment.store');

Route::post('/contact', [ContactController::class, 'store'])->name('contact.store')->middleware('throttle:contact');

Route::delete('/logout', [LoginController::class, 'destroy'])->name('login.destroy');
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');

Route::fallback([ErrorController::class, 'error404']);
