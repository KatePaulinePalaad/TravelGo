<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewController;
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

//==== DESTINATION
Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/logout',[HomeController::class,'logout'])->name('logout');
Route::get('/destination',[DestinationController::class,'index'])->name('destination');
Route::get('/destination/{id}',[DestinationController::class,'show'])->name('destination.show');
//===== ADMIN
Route::get('/admin',[AdminController::class,'index'])->name('admin.index')->middleware('auth');
Route::get('/admin/create',[AdminController::class,'create'])->name('admin.create')->middleware('auth');
Route::get('/admin/show/{id}',[AdminController::class,'show'])->name('admin.show')->middleware('auth');
Route::get('/admin/review',[AdminController::class,'review'])->name('admin.review')->middleware('auth');
Route::post('/admin/review/acceptacceptOrDenied/{id}',[AdminController::class,'acceptOrDenied'])->name('admin.action');
Route::post('/admin/store',[AdminController::class,'store'])->name('admin.store');
Route::put('/admin/update/{destination}',[AdminController::class,'update'])->name('admin.update');
Route::delete('/admin/destroy/{id}',[AdminController::class,'destroy'])->name('admin.destroy');

//==== SIGNUP
Route::post('/signup/store',[HomeController::class,'store'])->name('SignUp');
Route::post('/destination/book/{id}',[DestinationController::class,'book'])->name('book');

//==== ABOUT US
Route::view('/aboutUs', 'AboutUs.index')->name('about');

//==== REVIEW
Route::post('/review/{id}',[ReviewController::class,'review'])->name('review');
Route::get('/review',[ReviewController::class,'index'])->name('review.index');
Route::post('/reviewAll/store',[ReviewController::class,'storeGlobal'])->name('review.post');

//===== Login
Route::get('/login',[LoginController::class,'index'])->name('login');
Route::post('/login/user',[LoginController::class,'login'])->name('login.login');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

