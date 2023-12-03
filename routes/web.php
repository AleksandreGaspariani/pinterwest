<?php

use App\Http\Controllers\ImageController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/',[ImageController::class , 'index'])->name('index');
Route::get('image/show/{id}', [ImageController::class, 'show'])->name('show_image');


Route::middleware([Authenticate::class])->group(function () {
//    ProfileController
    Route::get('profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('profile/{user}',[ProfileController::class , 'show'])->name('check_profile');

//    ImageController
    Route::post('/image/store', [ImageController::class, 'store'])->name('store_image');
    Route::get('image/edit/{id}', [ImageController::class, 'edit'])->name('edit_image');
    Route::get('image/update/{id}', [ImageController::class, 'update'])->name('update_image');
    Route::delete('image/delete/{id}', [ImageController::class, 'destroy'])->name('destroy_image');
});

Auth::routes();
