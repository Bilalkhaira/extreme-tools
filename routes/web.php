<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminToolsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CarRequestsController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\SellerRequestController;
use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\ContactRequestController;
use App\Http\Controllers\XtremeToolUserController;
use App\Http\Controllers\SubcriptionPlanController;
use App\Http\Controllers\Apps\RoleManagementController;
use App\Http\Controllers\Apps\UserManagementController;
use App\Http\Controllers\Apps\PermissionManagementController;

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


Route::get('/clear', function () {
    Artisan::call('route:clear');
    Artisan::call('route:cache');
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    Artisan::call('config:cache');
    Artisan::call('view:cache');
    Artisan::call('optimize:clear');
    return 'clear done';
});

Route::get('/migrate', function () {
    Artisan::call('migrate');
    return 'migrated successfully';
});

Route::get('/storage-link', function () {
    Artisan::call('storage:link');
    return 'migrated successfully';
});


Route::middleware(['auth', 'verified', 'setlocale'])->group(function () {

    Route::get('/', [DashboardController::class, 'index']);

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::name('user-management.')->group(function () {
        Route::resource('/user-management/users', UserManagementController::class);
        Route::resource('/user-management/roles', RoleManagementController::class);
        Route::resource('/user-management/permissions', PermissionManagementController::class);
    });

    Route::resource('car-request', CarRequestsController::class);
    Route::resource('blogs', BlogController::class);
    Route::post('/blogs-edit', [BlogController::class, 'blogsEdit'])->name('blogs.edit');
    Route::resource('subcription-plan', SubcriptionPlanController::class);
    
    Route::post('/subcription-plan-update', [SubcriptionPlanController::class, 'update'])->name('subcription-plan.Update');
    Route::post('/subcription-plan-tools', [SubcriptionPlanController::class, 'subcriptionPlanTools'])->name('subcription-plan.tools');
    Route::post('/subcription-plan-tools-update', [SubcriptionPlanController::class, 'subcriptionPlanToolsUpdate'])->name('subcription-plan.tools.update');
    Route::post('/blog-update', [BlogController::class, 'blogUpdate'])->name('blogUpdate');

    Route::post('/update-user', [UserProfileController::class, 'updateUser'])->name('updateUser');

    Route::get('plans', [PlanController::class, 'index'])->name('plan.index');
    Route::get('plans/{plan}', [PlanController::class, 'show'])->name("plans.show");
    Route::post('subscription', [PlanController::class, 'subscription'])->name("subscription.create");

    Route::resource('categories', CategoriesController::class);
    Route::post('/categories-update', [CategoriesController::class, 'update'])->name('categories.update');
    Route::resource('tags', TagsController::class);
    Route::post('/tags-update', [TagsController::class, 'update'])->name('tags.update');

    Route::resource('xtreme-tools-users', XtremeToolUserController::class);
    Route::post('/xtreme-tools-users-update', [XtremeToolUserController::class, 'update'])->name('xtreme-tools-users.update');

    Route::resource('tools', AdminToolsController::class);
    Route::post('/tools-edit', [AdminToolsController::class, 'edit'])->name('tools.edit');
    Route::post('/tools-update', [AdminToolsController::class, 'update'])->name('toolUpdate');
    Route::resource('media', MediaController::class);
});

Route::get('/error', function () {
    abort(500);
});

Route::get('/auth/redirect/{provider}', [SocialiteController::class, 'redirect']);

require __DIR__ . '/auth.php';
