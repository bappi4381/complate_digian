<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admincontroller;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\BlogsController;
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

    Route::get('/service/create', [Admincontroller::class,'serviceCreate'])->name('service.create');
    Route::post('/service/add', [Admincontroller::class,'serviceStore'])->name('service.store');
    Route::get('/service/manage', [Admincontroller::class,'serviceManage'])->name('service.manage');
    Route::get('/service/edit/{id}', [Admincontroller::class,'serviceEdit'])->name('service.edit');
    Route::post('/service/update/{id}', [Admincontroller::class,'serviceupdate'])->name('service.update');
    Route::get('/service/remove/{id}', [Admincontroller::class,'serviceRemove'])->name('service.remove');

    //teams

    Route::get('/teams/create', [AboutController::class,'create'])->name('team.create');
    Route::post('/teams/add', [AboutController::class,'store'])->name('team.store');
    Route::get('/teams/manage', [AboutController::class,'manage'])->name('team.manage');
    Route::get('/team/edit/{id}', [AboutController::class,'teamEdit'])->name('team.edit');
    Route::post('/team/update/{id}', [AboutController::class,'teamupdate'])->name('team.update');
    Route::get('/team/remove/{id}', [AboutController::class,'teamRemove'])->name('team.remove');

    //blog
    Route::get('/blogs/create', [BlogsController::class,'create'])->name('blog.create');
    Route::post('/blogs/store', [BlogsController::class,'store'])->name('blog.store');
    Route::post('/blogs/catagory', [BlogsController::class,'catagoyCreate'])->name('blog.catagory');//catagory add
    Route::post('/blogs/catagory/manage', [BlogsController::class,'catagoyManage'])->name('catagori.manage');//catagory manage
    Route::get('/blogs/catagory/{id}', [BlogsController::class,'catagoriRemove'])->name('catagory.remove');//catagory remove

});

require __DIR__.'/auth.php';
