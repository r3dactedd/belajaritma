<?php

use App\Http\Controllers\CertificationController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\ForumController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ManageCertificationController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ManageCourseController;
use App\Http\Controllers\ManageTransactionController;
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

// Route::get('/', function () {
//     return view('guest');
// });
Route::redirect('/', '/home');
Route::get('/home', [ProfileController::class, 'homePage']);

//USER-RELATED ROUTE
Route::get('/login', [LoginController::class, 'index'])
    ->name('login')
    ->middleware('web','guest');
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

Route::get('/forgot', [ForgotPasswordController::class, 'showForgetPassword']);

Route::post('/forgot', [ForgotPasswordController::class, 'submitForgetPassword'])->name('forgetPost');

Route::get('reset-password/{token}/{email}', [ForgotPasswordController::class, 'showResetPassword'])->name('resetGet');

Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPassword'])->name('resetPost');

Route::get('/forum', [ForumController::class, 'showCourseData']);
Route::get('forum/course/{course_id}', [ForumController::class, 'showForumsByCourse'])->name('forum.forum');
Route::post('forum/course/{course_id}', [ForumController::class, 'createForum']);
Route::get('/forum/course/{course_id}/thread/{id}', [ForumController::class, 'forumDetail'])->name('forumDetail');
Route::post('/forum/course/{course_id}/thread/{id}', [ForumController::class, 'createReply']);
Route::delete('/forum/course/{course_id}/thread/{id}/delete', [ForumController::class, 'deleteThread']);


// Route::get('/courses/material/{id}/{material_id}/{type}/results', function(){
//     return view('contents.assignment_test_results');
// });
// Route::get('/forum/course/1', function () {
//     return view('forum.forum');
// });
// Route::get('/forum/course/1/thread/1', function () {
//     return view('forum.forum_thread');
// });

Route::get('/courses', [CourseController::class, 'showData']);

Route::get('/courses/{id}', [CourseController::class, 'courseDetail']);
Route::post('/courses/enroll/{id}', [EnrollmentController::class, 'enrollCourse']);

Route::get('/courses/1', function () {
    return view('contents.course_details');
});
// Route::get('/courses/1/pdf', function () {
//     return view('contents.session_pdf');
// });

Route::get('/courses/2/video', function () {
    return view('contents.session_video');
});

// Route::get('/courses/3/asg', function () {
//     return view('contents.session_assignment');
// });



Route::get('/courses/3/asg/questions', function () {
    return view('contents.assignment_questions');
});


Route::get('/profile/{username}', [ProfileController::class, 'viewProfile']);
Route::get('/editProfile', [ProfileController::class, 'editProfile']);
Route::post('/editProfile', [ProfileController::class, 'update']);
Route::post('/editProfile/password', [ProfileController::class, 'changePassword']);

// Route::get('/profile/edit', function () {
//     return view('profile.profile_edit');
// });

Route::get('/certifications', [CertificationController::class, 'showCertificationList']);
Route::get('/certifications/{id}', [CertificationController::class, 'certifDetail']);
Route::get('/certifications/aboutTest/{certif_id}', [CertificationController::class, 'aboutTest']);
Route::get('/certification/test/{certif_id}/{question_id}', [CertificationController::class, 'certifTestPage']);
// Route::get('/courses/material/{title}/{id}/{material_id}', [CourseController::class, 'showAssignmentResults'])->name('course.showResults');
// Route::get('/certifications/detail/{id}', [CertificationController::class, 'aboutTest']);

// Route::get('/test', function () {
//     return view('contents.test');
// });

// Route::get('/certifications/1', function () {
//     return view('contents.certification_details');
// });

Route::get('/courses/1/getcerti', function () {
    return view('contents.e-certi');
});

//sidebar route
Route::get('/courses/material/{title}/{id}/{material_id}', [SidebarController::class, 'showMaterial'])->name('sidebar.showSidebar');
Route::get('/courses/material/{title}/{id}/{material_id}/{question_id}/{type}', [CourseController::class, 'courseTestPage']);

Route::post('/submit-answers', [CourseController::class, 'submitAnswers'])->name('submit.answers');
Route::get('/courses/{courseId}/{materialId}/results', [CourseController::class, 'showAssignmentResults'])->name('course.showResults');
Route::get('/courses/material/{id}/{material_id}/{type}/score', [CourseController::class, 'showScore']);





Route::get('/courses/material/{title}/{course_id}/{current_material_id}/{direction}', [SidebarController::class, 'handleMaterialNavigation']);
// Route::get('/courses/material/{title}/{id}/{material_id}', [SidebarController::class, 'showSidebar'])->name('sidebar.showSidebar');
Route::get('/courses/material/next/{title}/{course_id}/{current_material_id}', [SidebarController::class, 'nextMaterial'])->name('sidebar.nextMaterial');
Route::get('/courses/material/previous/{title}/{course_id}/{current_material_id}', [SidebarController::class, 'previousMaterial'])->name('sidebar.previousMaterial');

//show page spesifik
Route::get('/courses/materialContent/{title}/{id}', [SidebarController::class, 'showByType']);

Route::get('/manager', function () {
    return view('administrator.admin_manager');
});

Route::get('/manager/course', [ManageCourseController::class, 'showCourseAdmin']);

// Route::get('/manager/course', function () {
//     return view('administrator.admin_courses.admin_course');
// });

Route::get('/manager/course/create', function () {
    return view('administrator.admin_courses.admin_course_create');
});
Route::post('/unpublishCourse/{id}',[ManageCourseController::class, 'unpublishCourse']);
Route::post('/publishCourse/{id}',[ManageCourseController::class, 'publishCourse']);

// Route::get('/manager/course/materiallist/{id}', function () {
//     return view('administrator.admin_courses.admin_course_list');
// });

Route::get('/manager/course/materiallist/{courseId}', [ManageCourseController::class, 'showMaterialList'])->name('manager.course.materiallist');
Route::post('/manager/course/materiallist/{courseId}', [ManageCourseController::class, 'createMaterial']);

Route::post('/manager/course/create', [ManageCourseController::class, 'createCourse']);
Route::delete('/manager/course/delete/{id}', [ManageCourseController::class, 'deleteCourse'])->name('modals.delete');

Route::get('/manager/course/edit/{id}', [ManageCourseController::class, 'editCoursePage'])->name('manage.course.editcourse');
Route::post('/manager/course/edit/{id}', [ManageCourseController::class, 'editCoursePOST']);

// Route::get('/manager/course/session/1/edit', function () {
//     return view('administrator.admin_courses.admin_course_session');
// });

Route::get('/manager/course/session/{id}/edit', [ManageCourseController::class, 'editMaterialGET']);
Route::post('/manager/course/session/{id}/edit', [ManageCourseController::class, 'editMaterialPOST']);
Route::post('/manager/course/session/{id}/edit/detail', [ManageCourseController::class, 'editMaterialDetail']);
Route::post('/manager/course/session/{id}/edit/detail/create/assignments', [ManageCourseController::class, 'createAssignmentQuestions']);
Route::delete('/manager/delete/assignments/{id}', [ManageCourseController::class, 'deleteQuestion']);
Route::post('/manager/edit/assignments/{id}', [ManageCourseController::class, 'editAssignmentQuestions']);

Route::post('/manager/course/session/{id}/edit/detail/create/final', [ManageCourseController::class, 'createFinalTestQuestions']);
Route::post('/manager/edit/final/{id}', [ManageCourseController::class, 'editFinalTestQuestions']);
Route::delete('/manager/delete/final/{id}', [ManageCourseController::class, 'deleteFinalTestQuestion']);

Route::delete('/manager/course/session/delete/{id}', [ManageCourseController::class, 'deleteMaterial']);

Route::get('/manager/certification', [ManageCertificationController::class, 'showCertificationData']);
Route::get('/manager/transaction', [ManageTransactionController::class, 'showTransactionList']);
Route::post('/manager/transaction/approve/{id}', [ManageTransactionController::class, 'approveTransaction']);
Route::post('/manager/transaction/decline/{id}', [ManageTransactionController::class, 'declineTransaction']);

Route::get('/manager/certification/create', function () {
    return view('administrator.admin_certifications.admin_certification_create');
});
Route::post('/manager/certification/create', [ManageCertificationController::class, 'createCertification']);
Route::get('/manager/certification/edit/{id}', [ManageCertificationController::class, 'editCertifPage']);
Route::post('/manager/certification/edit/{id}', [ManageCertificationController::class, 'editCertifPOST']);
Route::delete('/manager/certification/delete/{id}', [ManageCertificationController::class, 'deleteCertification']);

Route::get('/manager/certification/edit/test/{id}', [ManageCertificationController::class, 'editCertifTestPage']);
Route::post('/manager/certification/edit/test/{id}/set/score', [ManageCertificationController::class, 'setScore']);
Route::post('/manager/certification/edit/test/{id}/create/questions', [ManageCertificationController::class, 'createCertifQuestions']);
Route::post('/manager/certification/edit/test/{id}/edit/question', [ManageCertificationController::class, 'editCertifQuestions']);
Route::delete('/manager/certification/edit/test/{id}/delete/question', [ManageCertificationController::class, 'deleteCertifQuestion']);

Route::post('/unpublishCertif/{id}',[ManageCertificationController::class, 'unpublishCertif']);
Route::post('/publishCertif/{id}',[ManageCertificationController::class, 'publishCertif']);

Route::get('/manager/forum', [ForumController::class, 'manageForumList']);

Route::get('/transaction/{id}', [CertificationController::class, 'registerCertification']);
Route::post('/transaction/{id}', [CertificationController::class, 'createTransaction']);

Route::get('/profile/dashboard', function () {
    return view('profile.profile_dashboard');
});
Route::get('/profile/transaction', [ProfileController::class, 'showTransactionList']);

Route::get('/profile/courses', function () {
    return view('profile.profile_courselist');
});

Route::get('/profile/certifications', function () {
    return view('profile.profile_certilist');
});
