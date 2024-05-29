<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admincontroller;
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

Route::get('/admin/login', function () {
    return view('admin.login');
});

Route::get('/dashboard', function () {
    return view('admin.dashboard.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/header/create', [Admincontroller::class,'headerCreate'])->name('header.create');
    Route::post('/header/add', [Admincontroller::class,'headerStore'])->name('header.store');
    Route::get('/header/manage', [Admincontroller::class,'headerManage'])->name('header.manage');
    Route::get('/header/edit/{id}', [Admincontroller::class,'headerEdit'])->name('header.edit');
    Route::post('/header/update/{id}', [Admincontroller::class,'headerupdate'])->name('header.update');
    Route::get('/header/remove/{id}', [Admincontroller::class,'headerRemove'])->name('header.remove');

});

require __DIR__.'/auth.php';
