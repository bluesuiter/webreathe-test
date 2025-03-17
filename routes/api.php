<?php


use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('api')->group(function () {
    Route::post('/module-activity/store', [App\Http\Controllers\ModuleActivityController::class, 'store'])->name('store.modeActivity');

    // Get notifications list
    Route::get('/notification', [App\Http\Controllers\NotificationController::class, 'index'])->name('notification.index');
});
