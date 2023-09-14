<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\ForumController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
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
    return view('welcome');
});

//USER-RELATED ROUTE
Route::get('/login', [LoginController::class, 'index'])
    ->name('login')
    ->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/signup', function () {
    return view('authentication.signup');
});
Route::post('/signup', [RegisterController::class, 'register']);

Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/home', function () {
    return view('home');
});

// Route::get('/forum', function () {
//     return view('forum.forum');
// });

Route::get('/forum', [ForumController::class, 'showForumList']);

// Route::get('/forum/1', function () {
//     return view('forum.forum_content');
// });

Route::get('/forum/{id}', [ForumController::class, 'forumDetail']);
Route::post('/createForum', [ForumController::class, 'createForum']);


// Route::get('/courses', function () {
//     return view('courses.courses');
// });

Route::get('/courses', [CourseController::class, 'showData']);

Route::get('/manager', function () {
    return view('administrator.admin_manager');
});

Route::get('/manager/1', function () {
    return view('administrator.admin_content');
});

Route::get('/courses/{id}', [CourseController::class, 'courseDetail']);

Route::get('/courses/1', function () {
    return view('courses.course_content');
});
Route::get('/courses/1/pdf', function () {
    return view('courses.course_pdf');
});
Route::get('/courses/2/video', function () {
    return view('courses.course_video');
});
Route::get('/courses/3/asg', function () {
    return view('courses.course_asg');
});

Route::get('/profile', [ProfileController::class, 'viewProfile']);

Route::get('/profile/edit', [ProfileController::class,'editProfile']);
Route::post('/profile/edit', [ProfileController::class,'update']);
Route::get('/profile/1', function () {
    return view('profile.profile');
});

Route::get('/profile/1/edit', function () {
    return view('profile.profile_edit');
});

Route::get('/certifications', function () {
    return view('certification.certifications');
});

Route::get('/certifications/1', function () {
    return view('certification.certification_content');
});

Route::get('/courses/1/getcerti', function () {
    return view('courses.course_certificate');
});

Route::get('/manager', function () {
    return view('administrator.admin_manager');
});

Route::get('/manager/course', function () {
    return view('administrator.admin_course');
});

Route::get('/manager/certification', function () {
    return view('administrator.admin_certification');
});
Route::get('/manager/forum', function () {
    return view('administrator.admin_forum');
});
