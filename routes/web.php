<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceController as PublicServiceController;
use App\Http\Controllers\PostController as PublicPostController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\ServiceController as AdminServiceController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\ContactMessageController as AdminContactMessageController;
use App\Http\Controllers\Admin\SettingController as AdminSettingController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/services', [PublicServiceController::class, 'index'])->name('services.index');
Route::get('/services/{slug}', [PublicServiceController::class, 'show'])->name('services.show');
Route::get('/services/title/{title}', [PublicServiceController::class, 'fromTitle'])->name('services.fromTitle');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/blog', [PublicPostController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [PublicPostController::class, 'show'])->name('blog.show');
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('/sitemap.xml', [HomeController::class, 'sitemap'])->name('sitemap');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('services', AdminServiceController::class);
    Route::resource('posts', AdminPostController::class);
    Route::resource('messages', AdminContactMessageController::class)->only(['index', 'show', 'destroy', 'update']);
    Route::get('messages/{message}/toggle-read', [AdminContactMessageController::class, 'toggleRead'])->name('messages.toggleRead');
    Route::get('messages/export', [AdminContactMessageController::class, 'export'])->name('messages.export');
    Route::resource('settings', AdminSettingController::class)->only(['index', 'create', 'store', 'edit', 'update']);
});
