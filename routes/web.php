<?php

use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
// Laravel 8
Route::get('/payment/callback', [App\Http\Controllers\PaymentController::class, 'handleGatewayCallback'])->name('callback');

Route::post('/pay', [PaymentController::class, 'redirectToGateway'])->name('pay');





Route::get('/', [PagesController::class, 'index']);
Route::match(['post', 'get'], '/register', [PagesController::class, 'AdminRegister']);
Route::match(['post', 'get'], '/inregister', [PagesController::class, 'InstructorRegister']);
Route::match(['post', 'get'], '/stregister/{id?}', [PagesController::class, 'StudentRegister']);
Route::match(['get','post'], '/login', [PagesController::class, 'login'])->name('login');
Route::get('/dashboard', [PagesController::class, 'dashboard'])->name('dashboard')->middleware('auth');
Route:: match(['get', 'post'], '/profile', [PagesController::class, 'profile'])->name('profile');
Route::get('/courses', [PagesController::class, 'courses']);
Route::match(['get', 'post'],'/instructors', [PagesController::class, 'instructor']);
Route::match(['get', 'post'], '/form', [PagesController::class, 'form']);
Route::get('/details/{id}/{user_id?}', [PagesController::class, 'singleCourse']);
Route::get('/allcourses', [PagesController::class, 'allCourses']);
Route::get('/error', [PagesController::class, 'error']);
Route::get('/logout', [DashBoardController::class, 'logout']);
Route::post('/newcourse', [DashBoardController::class, 'AddNewCourse']);
Route::match(['get', 'post'], '/newlesson', [DashBoardController::class, 'AddNewModuleAndLessons'])->name('newlesson');
// Route::match( '/suspend', [PagesController::class, 'suspendUser']);
Route::post('/suspend/{id}', [PagesController::class, 'instructor'])->name('suspend');
// Route::post('/release', [DashBoardController::class, 'releaseUser']);
Route::match(['get', 'post'], '/enrolled', [PagesController::class, 'enrolledCourses']);
Route::match(['get', 'post'], '/view/{id}', [PagesController::class, 'viewEnrolledCourses']);
Route::match(['get', 'post'], '/payment', [DashBoardController::class, "payment"]);
Route::match(['get', 'post'], '/all', [PagesController::class, 'all'] );
Route::match(['get', 'post'], '/delete/{id}', [PagesController::class, 'deleteCourse']);
Route::match(['get', 'post'], '/categories', [PagesController::class, 'categories']);
Route::match(['get', 'post'], '/category/{id}', [PagesController::class, 'deleteCategory']);
