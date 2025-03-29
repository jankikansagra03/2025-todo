<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [GuestController::class, 'home'])->name('index');
Route::get('index', [GuestController::class, 'home'])->name('index');
Route::get('login', [GuestController::class, 'login'])->name('signin');
Route::get('register', [GuestController::class, 'register'])->name('signup');
Route::get('about', [GuestController::class, 'about'])->name('aboutus');
Route::get('contact', [GuestController::class, 'contact'])->name('contactus');
Route::get('forgotPassword', [GuestController::class, 'forgot_password'])->name('forgotPwd');
Route::post('register_action', [GuestController::class, 'register_action']);
Route::get('verifyAccount/{email}/{token}', [GuestController::class, 'verifyAccount'])->name('verifyemail');
Route::post('loginAuth', [GuestController::class, 'loginAuth'])->name('verifyLogin');
Route::get('logout', [GuestController::class, 'logout'])->name('logout');
Route::get('register', [GuestController::class, 'register'])->name('signup');
// Route::get('forgotPassword', [GuestController::class, 'forgot_password'])->name('forgotPwd');
// Route::post('forgotPasswordAction', [GuestController::class, 'forgotPasswordAction'])->name('forgotPwdAction');
// Route::get('resetPassword/{email}/{token}', [GuestController::class, 'resetPassword'])->name('resetPwd');
// Route::post('resetPasswordAction', [GuestController::class, 'resetPasswordAction'])->name('resetPwdAction');
// Route::get('dashboard', [GuestController::class, 'dashboard'])->name('dashboard');

// middleware login Auth for user and user routes
Route::middleware(['user'])->group(function () {
    Route::get('userDashboard', [UserController::class, 'userDashboard'])->name('userDashboard');
    Route::get('UserLogout', [UserController::class, 'user_logout'])->name('UserLogout');
    Route::get('userAddTask', [UserController::class, 'user_add_task'])->name('userAddTask');
    Route::post('userAddTask', [UserController::class, 'user_add_task_action'])->name('userAddTaskAction');
    Route::get('userTaskList', [UserController::class, 'user_task_list'])->name('userTaskList');
    Route::get('userEditTask/{id}', [UserController::class, 'user_edit_task'])->name('userEditTask');
    Route::post('userUpdateTask/{id}', [UserController::class, 'user_edit_task_action'])->name('userEditTaskAction');
    Route::get('userDeleteTask/{id}', [UserController::class, 'user_delete_task'])->name('userDeleteTask');
    Route::get('userCompletedTask', [UserController::class, 'user_completed_task'])->name('userCompletedTask');
    Route::get('/userMarkAsCompleted/{id}', [UserController::class, 'user_mark_completed_task'])->name('userMarkCompletedTask');
    Route::get('/userMarkAsPending/{id}', [UserController::class, 'user_mark_pending_task'])->name('userMarkPendingTask');
    Route::get('userChangePassword', [UserController::class, 'user_change_password'])->name('userChangePassword');
    Route::post('userChangePassword', [UserController::class, 'user_change_password_action'])->name('userChangePasswordAction');
    Route::get('userProfile', [UserController::class, 'user_profile'])->name('userProfile');
    Route::post('userEditProfile', [UserController::class, 'user_profile_action'])->name('userProfileAction');
    Route::get('userChangeProfile', [UserController::class, 'user_change_profile'])->name('userProfileAction');
    // Route::get('userProfileImage', [UserController::class, 'user_profile_image'])->name('userProfileImage');
    Route::post('userProfileImage', [UserController::class, 'user_profile_image_action'])->name('userProfileImageAction');
});

// middleware login Auth for admin and admin routes
Route::middleware(['admin'])->group(function () {
    Route::get('adminDashboard', [AdminController::class, 'adminDashboard'])->name('adminDashboard');
    Route::get('adminLogout', [AdminController::class, 'admin_logout']);
});

// Forget Password Routes
