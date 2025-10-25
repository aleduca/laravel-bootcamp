<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'home', ['title' => 'Home'])->name('home');
Route::view('/course', 'course', ['title' => 'Course'])->name('course');
Route::view('/lesson', 'lesson', ['title' => 'Course'])->name('lesson');
Route::view('/courses', 'courses', ['title' => 'Course'])->name('courses');
Route::view('/contact', 'contact', ['title' => 'Course'])->name('contact');
Route::view('/login', 'login', ['title' => 'Course'])->name('login');
Route::view('/checkout', 'checkout', ['title' => 'Course'])->name('checkout');
