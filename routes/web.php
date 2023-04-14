<?php

use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\DistrictController;
use App\Http\Controllers\Admin\EligibilityController;
use App\Http\Controllers\Admin\ItknowledgeController;
use App\Http\Controllers\Admin\JobController;
use App\Http\Controllers\Admin\JobEligibilityController;
use App\Http\Controllers\Admin\JobItKnowledgeController;
use App\Http\Controllers\Admin\StateController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Front\UserInfoController;
use App\Http\Controllers\Admin\JobApplicationController;
use App\Http\Controllers\Admin\CustomAdminAuthcontroller;

use App\Http\Controllers\Auth\ForgotPasswordController;
use Illuminate\Support\Facades\Artisan;
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



Route::any('/admin/login', function () {
    return view('AdminAuth/AdminLogin');
})->name('LoginAdmin');

Route::get('/clear-cache', function () {

    Artisan::call('cache:clear');
    return "cache clear";
});
Route::get('/', [UserInfoController::class, 'userjobs'])->name('userjobs');
Route::get('/fill-form/{id}', [UserInfoController::class, 'index'])->name('Submit-Form');
Route::post('/submit-form/{id}', [UserInfoController::class, 'store'])->name('FormSubmit');
Route::get('/preview-form/{id}', [UserInfoController::class, 'Preview'])->name('previewpage');

Route::post('/admin-loggedin', [CustomAdminAuthcontroller::class, 'CustomAdminLogin'])->name('AdminCustomLogin');
Route::get('/admin-logout', [CustomAdminAuthcontroller::class, 'CustomLogout'])->name('AdminLogout');


Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

Route::group([
    'prefix' => '/admin',
    'as' => 'admin.',
], function () {

    Route::get('/admin-edit-account', [CustomAdminAuthcontroller::class, 'adminEditAccount'])->name('AdminEditAccount');
    Route::post('/admin-update-account', [CustomAdminAuthcontroller::class, 'updateprofile'])->name('adminUpdateAccount');

    Route::any('fetch-states', [DistrictController::class, 'fetchState']);
    Route::any('fetch-district', [DistrictController::class, 'fetchDistrict']);
    Route::any('fetch-district-department', [DistrictController::class, 'fetchDistrictDepartment']);

    Route::resource('states', StateController::class)->middleware(['AdminLogin']);
    Route::post('delete-state', [StateController::class, 'destroy'])->middleware(['AdminLogin']);

    Route::resource('district', DistrictController::class)->middleware(['AdminLogin']);
    Route::post('delete-district', [DistrictController::class, 'destroy']);

    Route::resource('department', DepartmentController::class);
    Route::post('delete-department', [DepartmentController::class, 'destroy'])->middleware(['AdminLogin']);

    Route::resource('eligibilities', EligibilityController::class)->middleware(['AdminLogin']);
    Route::post('delete-eligibility', [EligibilityController::class, 'destroy'])->middleware(['AdminLogin']);

    Route::resource('itknowledges', ItknowledgeController::class)->middleware(['AdminLogin']);
    Route::post('delete-itknowledges', [ItknowledgeController::class, 'destroy'])->middleware(['AdminLogin']);

    Route::resource('jobs', JobController::class)->middleware(['AdminLogin']);
    Route::post('delete-jobs', [JobController::class, 'destroy'])->middleware(['AdminLogin']);


    Route::resource('jobeligibilities', JobEligibilityController::class)->middleware(['AdminLogin']);
    Route::post('delete-jobeligibilities', [JobEligibilityController::class, 'destroy'])->middleware(['AdminLogin']);

    Route::resource('job_it_knowledge', JobItKnowledgeController::class)->middleware(['AdminLogin']);
    Route::post('delete-job_it_knowledge', [JobItKnowledgeController::class, 'destroy'])->middleware(['AdminLogin']);




    Route::resource('countries', CountryController::class)->middleware(['AdminLogin']);
    Route::post('delete-countries', [CountryController::class, 'destroy'])->middleware(['AdminLogin']);

    Route::resource('category', CategoryController::class)->middleware(['AdminLogin']);
    Route::post('delete-category', [CategoryController::class, 'destroy'])->middleware(['AdminLogin']);

    Route::resource('job_applicant', JobApplicationController::class)->middleware(['AdminLogin']);
    Route::get('job_applicant/{id}', [JobApplicationController::class, 'show'])->name('userInfoShow')->middleware(['AdminLogin']);
    Route::post('delete-job-application', [JobApplicationController::class, 'destroy'])->middleware(['AdminLogin']);
    Route::get('get-district', [JobController::class, 'getDistrict'])->name('jobs.district');
    Route::get('get-department-district', [JobController::class, 'getDepartmentDistrict'])->name('jobs.district');

    Route::get('applicant-export', [JobApplicationController::class, 'export'])->name('applicant.export');
});
