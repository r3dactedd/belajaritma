<?php

use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});
Route::get('/create', function () {
    return view('create');
});
Route::get('/home', function () {
    return view('home');
});
Route::get('/courses', function () {
    return view('courses/courses');
});
Route::get('/courses/1', function () {
    return view('courses/course_content');
});
Route::get('/courses/1/pdf', function () {
    return view('courses/course_pdf');
});
Route::get('/courses/2/video', function () {
    return view('courses/course_video');
});

Route::get('/profile/1', function () {
    return view('profile');
});

Route::get('/courses/1/getcerti', function () {
    return view('certificate');
});
Route::get('/courses/1/getcerti', function () {
    return view('certificate');
});

Route::get('/courses/1/getcerti', function () {
    return view('certificate');
});
