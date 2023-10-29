<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\ForumController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ManageCourseController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SidebarController;

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
    return view('home');
});

//USER-RELATED ROUTE
Route::get('/login', [LoginController::class, 'index'])
    ->name('login')
    ->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/signup', function () {
    return view('authentication.signup');
});
Route::get('/forgot', function () {
    return view('authentication.forgot');
});

Route::get('/reset', function () {
    return view('authentication.reset');
});
Route::post('/signup', [RegisterController::class, 'register']);

Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/home', function () {
    return view('home');
});

Route::get('/forum', [ForumController::class, 'showCourseData']);
Route::get('forum/course/{course_id}', [ForumController::class, 'showForumsByCourse']);
Route::get('/forum/course/{course_id}/thread/{id}', [ForumController::class, 'forumDetail']);

// Route::get('/forum/course/1', function () {
//     return view('forum.forum');
// });
// Route::get('/forum/course/1/thread/1', function () {
//     return view('forum.forum_thread');
// });

Route::get('/courses', [CourseController::class, 'showData']);

Route::get('/courses/{id}', [CourseController::class, 'courseDetail']);

Route::get('/courses/1', function () {
    return view('contents.course_details');
});
// Route::get('/courses/1/pdf', function () {
//     return view('contents.session_pdf');
// });

Route::get('/courses/2/video', function () {
    return view('contents.session_video');
});

Route::get('/courses/3/asg', function () {
    return view('contents.session_assignment');
});

Route::get('/courses/3/asg/questions', function () {
    return view('contents.assignment_questions');
});
Route::get('/courses/3/asg/results', function () {
    return view('contents.assignment_results');
});

Route::get('/profile/name', [ProfileController::class, 'viewProfile']);
Route::get('/profile/name/edit',[ProfileController::class, 'editProfile']);
Route::post('/editProfile',[ProfileController::class, 'update']);
Route::post('/editProfile/password',[ProfileController::class, 'changePassword']);

// Route::get('/profile/name/edit', function () {
//     return view('profile.profile_edit');
// });

Route::get('/certifications', function () {
    return view('contents.certifications');
});

Route::get('/certifications/1', function () {
    return view('contents.certification_details');
});

Route::get('/courses/1/getcerti', function () {
    return view('contents.e-certi');
});

Route::get('/material/{title}/{id}', [SidebarController::class, 'showSidebar'])->name('sidebar.showSidebar');

//show page spesifik
Route::get('/materialContent/{title}/{id}', [SidebarController::class, 'showByType'])->name('sidebar.showByType');

Route::get('/manager', function () {
    return view('administrator.admin_manager');
});

Route::get('/manager/course', function () {
    return view('administrator.admin_courses.admin_course');
});

Route::get('/manager/course/create', function () {
    return view('administrator.admin_courses.admin_course_create');
});
Route::get('/manager/course/edit', function () {
    return view('administrator.admin_courses.admin_course_edit');
});
Route::get('/manager/course/session/1/edit', function () {
    return view('administrator.admin_courses.admin_course_session');
});

Route::get('/manager/certification', function () {
    return view('administrator.admin_certifications.admin_certification');
});
Route::get('/manager/forum', [ForumController::class, 'manageForumList']);

Route::get('/transaction', function () {
    return view('transactions.transaction');
});

Route::get('/profile/name/dashboard', function () {
    return view('profile.profile_dashboard');
});

Route::get('/profile/name/courses', function () {
    return view('profile.profile_courselist');
});

Route::get('/profile/name/certifications', function () {
    return view('profile.profile_certilist');
});
