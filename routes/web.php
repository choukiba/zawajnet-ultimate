<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\NewPasswordController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// ✅ الصفحة الرئيسية
Route::get('/', [HomeController::class, 'index'])->name('home');

// ✅ عرض الملف الشخصي للعضو
Route::get('/profile/{id}', [ProfileController::class, 'show'])->name('profile.show');

// ✅ نموذج إرسال رابط استعادة كلمة المرور
Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])
     ->middleware('guest')
     ->name('password.request');

// ✅ معالجة إرسال رابط استعادة كلمة المرور
Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
     ->middleware('guest')
     ->name('password.email');

// ✅ صفحة إعادة تعيين كلمة المرور
Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])
     ->middleware('guest')
     ->name('password.reset');

// ✅ معالجة إعادة تعيين كلمة المرور
Route::post('/reset-password', [NewPasswordController::class, 'store'])
     ->middleware('guest')
     ->name('password.update');

// ✅ تسجيل الدخول والتسجيل (Breeze)
require __DIR__.'/auth.php';
use App\Http\Controllers\Auth\RegisterController;

// ...

Route::get('/register', [RegisterController::class, 'create'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);
Route::get('/profile/{id}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::put('/profile/{id}', [ProfileController::class, 'update'])->name('profile.update');

use App\Http\Controllers\AccountController;

Route::get('/account/settings', [AccountController::class, 'edit'])->name('account.settings');
Route::put('/account/update-email', [AccountController::class, 'updateEmail'])->name('account.update.email');
Route::put('/account/update-password', [AccountController::class, 'updatePassword'])->name('account.update.password');

use App\Http\Controllers\PhotoController;

Route::get('/account/photo', [PhotoController::class, 'edit'])->name('account.photo');
Route::post('/account/photo', [PhotoController::class, 'upload'])->name('account.photo.upload');
Route::delete('/account/photo', [PhotoController::class, 'delete'])->name('account.photo.delete');

use App\Http\Controllers\SearchController;

Route::get('/search', [SearchController::class, 'index'])->name('search');
