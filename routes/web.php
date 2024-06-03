<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admincontroller;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\BlogsController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\HomeController;

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
Route::get('/', function () {
    return view('front.index.index');
});
Route::get('/home', [HomeController::class, 'index'])->name('home.index');
Route::get('/service', [HomeController::class, 'service'])->name('view.service');
Route::get('/about', [HomeController::class, 'about'])->name('view.about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::post('/contact/submit', [HomeController::class, 'homeContact'])->name('home.contact');


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
    Route::get('/blogs/manage', [BlogsController::class,'manage'])->name('blog.manage');
    Route::get('/blogs/edit/{id}', [BlogsController::class,'edit'])->name('blog.edit');
    Route::post('/blogs/update/{id}', [BlogsController::class,'update'])->name('blog.update');
    Route::get('/blogs/remove/{id}', [BlogsController::class,'remove'])->name('blog.remove');
    Route::post('/blogs/catagory', [BlogsController::class,'catagoyCreate'])->name('blog.catagory');//catagory add
    Route::post('/blogs/catagory/manage', [BlogsController::class,'catagoyManage'])->name('catagori.manage');//catagory manage
    Route::get('/blogs/catagory/{id}', [BlogsController::class,'catagoriRemove'])->name('catagory.remove');//catagory remove

    //projects

    Route::get('/projects/create', [ProjectsController::class,'create'])->name('project.create');
    Route::post('/projects/store', [ProjectsController::class,'store'])->name('project.store');
    Route::get('/projects/manage', [ProjectsController::class,'manage'])->name('project.manage');
    Route::get('/projects/edit/{id}',[ProjectsController::class,'edit'])->name('project.edit');
    Route::post('/projects/update/{id}',[ProjectsController::class,'update'])->name('project.update');
    Route::get('/projects/remove/{id}',[ProjectsController::class,'remove'])->name('project.remove');


    //test

    Route::get('/test/create', [TestimonialController::class,'create'])->name('test.create');
    Route::post('/test/store', [TestimonialController::class,'store'])->name('test.store');
    Route::get('/test/manage', [TestimonialController::class,'manage'])->name('test.manage');
    Route::get('/test/edit/{id}',[TestimonialController::class,'edit'])->name('test.edit');
    Route::post('/test/update/{id}',[TestimonialController::class,'update'])->name('test.update');
    Route::get('/test/remove/{id}',[TestimonialController::class,'remove'])->name('test.remove');

    //contact
    Route::get('/contact/manage', [Admincontroller::class,'contactManage'])->name('contact.manage');
    Route::get('/contact/remove/{id}',[Admincontroller::class,'contactRemove'])->name('contact.remove');
});

require __DIR__.'/auth.php';
