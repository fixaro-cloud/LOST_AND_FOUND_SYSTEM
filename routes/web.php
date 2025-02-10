<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\FoundItemController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\LostItemController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VerificationController;
use App\Http\Middleware\AdminMiddleware;
use App\Mail\PasswordResetMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome'); 
});

Route::middleware(['auth','normalUser','suspend'])->group(function (){

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware('verified')->name('dashboard');

    Route::get('/report-lost-item', [LostItemController::class, "create"]);
    Route::post('/report-lost-item/store', [LostItemController::class, "store"]);
    Route::get('/report-found-item', [FoundItemController::class, "create"]);
    Route::post('/report-found-item/store',[FoundItemController::class,"store"]);
    Route::get('/dashboard/reported-items',[ItemController::class,"index"]);
    Route::get('/dashboard/{user}/reported-items', [ItemController::class, "show"]);
    Route::get('/dashboard/{lostItem}/matches', [ItemController::class, "match"]);
    Route::get('/dashboard/{lostItem}/matches/{foundItem}/verify', [VerificationController::class, "show"]);
    Route::post('/dashboard/{lostItem}/matches/{foundItem}/verify/', [VerificationController::class, "store"]);
    Route::get('/review-pending', [VerificationController::class, "showReviewPending"]);
    Route::get('/verification-error', [VerificationController::class, "showVerifyError"]);
    Route::get('/dashboard/{user}/notifications', [NotificationController::class, "showNotifications"]);
    Route::get('/notifications/{id}/mark-as-read', [NotificationController::class, "markAsRead"]);
    // Route::get('/route-to-chatify', [NotificationController::class, "routeToChatify"]);


    
});

Route::middleware(['auth','admin'])->group(function (){ 

    Route::get('/admin-dashboard-review', [AdminController::class, "showReview"])->middleware('verified');
    Route::get('/admin-dashboard', [AdminController::class, "index"])->middleware('verified');
    Route::get('/admin-dashboard-user-management', [AdminController::class, "showUserManagement"])->middleware('verified');
    Route::post('/admin/suspend-user/{user}', [AdminController::class, "suspendUser"])->middleware('verified');
    Route::post('/admin/activate-user/{user}', [AdminController::class, "activateUser"])->middleware('verified');
    Route::post('/admin-approve/{lostItem}/{foundItem}', [AdminController::class, "approveReview"])->middleware('verified');

    Route::post('/admin-reject/{lostItem}/{foundItem}', [AdminController::class, "rejectReview"])->middleware('verified');

    Route::get('/admin-dashboard-location-management', [AdminController::class, "showLocation"])->middleware('verified');

    Route::get('/admin-dashboard-category-management', [AdminController::class, "showCategory"])->middleware('verified');



});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
