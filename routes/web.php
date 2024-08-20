<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;

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

// Route::get("home")
Route::prefix('newadmin')->name('newadmin.')->group(function () {

    Route::get("home", [AdminController::class, 'home'])->name('home')->middleware('adminAuth');
    Route::post("logout", [AdminController::class, 'logout'])->name('logout')->middleware('adminAuth');

    
    Route::get("login", [AdminController::class, 'login'])->name('login');
    Route::get("register", [AdminController::class, 'register'])->name('register');



    Route::post("loginStore", [AdminController::class, 'loginStore'])->name('loginStore');
    Route::post("registerStore", [AdminController::class, 'registerStore'])->name('registerStore');
});



/* |--------------------------------------------------------------------------
|
 End ADMIN ROUTES
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::prefix('admin')->name("admin.")->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
    Route::get('/profile', [HomeController::class, 'profile'])->name('profile');
    Route::get('/eror404', [HomeController::class, 'eror404'])->name('eror404');
    Route::get('/faq', [HomeController::class, 'faq'])->name('faq');
});
Route::prefix('project')->name("project.")->group(function () {
    Route::get('/index', [ProjectController::class, 'index'])->name('index');
    Route::get('/create', [ProjectController::class, 'create'])->name('create');
    Route::post('/store', [ProjectController::class, 'store'])->name('store');

    Route::get('/show/{id}', [ProjectController::class, 'show'])->name('show');
    Route::get('/edit/{id}', [ProjectController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [ProjectController::class, 'update'])->name('update');
    Route::get('/destroy/{id}', [ProjectController::class, 'destroy'])->name('destroy');
    Route::post('/update_status/{id}', [ProjectController::class, 'update_status'])->name('update_status');
    // download_file
    Route::get('/download_file/{id}', [ProjectController::class, 'download_file'])->name('download_file');
});
Route::prefix('task')->name("task.")->group(function () {
    Route::get('/index', [TaskController::class, 'index'])->name('index');
    Route::get('/create', [TaskController::class, 'create'])->name('create');
    Route::post('/store', [TaskController::class, 'store'])->name('store');

    Route::get('/show/{id}', [TaskController::class, 'show'])->name('show');
    Route::get('/edit/{id}', [TaskController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [TaskController::class, 'update'])->name('update');
    Route::get('/destroy/{id}', [TaskController::class, 'destroy'])->name('destroy');
    // ------------------

});
Route::prefix('note')->name("note.")->group(function () {
    Route::get('/index', [NoteController::class, 'index'])->name('index');
    Route::get('/create', [NoteController::class, 'create'])->name('create');
    Route::post('/store', [NoteController::class, 'store'])->name('store');

    Route::get('/show/{id}', [NoteController::class, 'show'])->name('show');
    Route::get('/edit/{id}', [NoteController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [NoteController::class, 'update'])->name('update');
    Route::get('/destroy/{id}', [NoteController::class, 'destroy'])->name('destroy');
});
