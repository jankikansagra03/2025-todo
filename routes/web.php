<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware(['guest'])->group(function () {
    Route::get('/', [GuestController::class, 'home'])->name('index');
    Route::get('index', [GuestController::class, 'home']);
    Route::get('login', [GuestController::class, 'login'])->name('signin');
    Route::get('contact', [GuestController::class, 'contact'])->name('contactus');
});


Route::get('register', [GuestController::class, 'register'])->name('signup');
Route::get('about', [GuestController::class, 'about'])->name('aboutus');

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
    Route::get('adminAddTask', [AdminController::class, 'admin_add_task'])->name('adminAddTask');
    Route::post('adminAddTask', [AdminController::class, 'admin_add_task_action'])->name('adminAddTaskAction');
    Route::get('adminTaskList', [AdminController::class, 'admin_task_list'])->name('adminTaskList');
    Route::get('adminEditTask/{id}', [AdminController::class, 'admin_edit_task'])->name('adminEditTask');
    Route::post('adminUpdateTask/{id}', [AdminController::class, 'admin_edit_task_action'])->name('adminEditTaskAction');
    Route::get('adminDeleteTask/{id}', [AdminController::class, 'admin_delete_task'])->name('adminDeleteTask');
    Route::get('adminAddUser', [AdminController::class, 'admin_add_user'])->name('adminAddUser');
    Route::post('adminAddUser', [AdminController::class, 'admin_add_user_action'])->name('adminAddUserAction');
    Route::get('adminUserList', [AdminController::class, 'admin_user_list'])->name('adminUserList');
    Route::get('adminEditUser/{id}', [AdminController::class, 'admin_edit_user'])->name('adminEditUser');
    Route::post('adminUpdateUser/{id}', [AdminController::class, 'admin_edit_user_action'])->name('adminEditUserAction');
    Route::get('adminDeleteUser/{id}', [AdminController::class, 'admin_delete_user'])->name('adminDeleteUser');
    Route::get('adminChangePassword', [AdminController::class, 'admin_change_password'])->name('adminChangePassword');
    Route::post('adminChangePassword', [AdminController::class, 'admin_change_password_action'])->name('adminChangePasswordAction');
    Route::get('adminProfile', [AdminController::class, 'admin_profile'])->name('adminProfile');
    Route::post('adminEditProfile', [AdminController::class, 'admin_profile_action'])->name('adminProfileAction');
    Route::get('adminChangeProfile', [AdminController::class, 'admin_change_profile'])->name('adminProfileAction');
    Route::get('adminProfileImage', [AdminController::class, 'admin_profile_image'])->name('adminProfileImage');
    Route::post('adminProfileImage', [AdminController::class, 'admin_profile_image_action'])->name('adminProfileImageAction');
});

// Forget Password Routes
Route::post('SendOTP', [GuestController::class, 'send_otp'])->name('SendOTP');
Route::post('VerifyOTP', [GuestController::class, 'verify_otp'])->name('VerifyOTP');
Route::get('OTPForm', [GuestController::class, 'otp_form'])->name('OTPForm');
Route::get('ResetPassword', [GuestController::class, 'new_password'])->name('ResetPassword');
Route::post('UpdatePassword', [GuestController::class, 'update_new_password'])->name('UpdatePassword');
Route::get('ForgotPassword', [GuestController::class, 'forgot_password'])->name('ForgotPassword');
