<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SocialAuthController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ProfileCompletionController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\CityController;

// ✅ الصفحة الرئيسية
Route::get('/', [HomeController::class, 'index'])->name('home');

// ✅ عرض الملف الشخصي
Route::get('/profile/{id}', [ProfileController::class, 'show'])->name('profile.show');
Route::get('/profile/{id}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::put('/profile/{id}', [ProfileController::class, 'update'])->name('profile.update');

// ✅ إعدادات الحساب
Route::get('/account/settings', [AccountController::class, 'edit'])->name('account.settings');
Route::put('/account/update-email', [AccountController::class, 'updateEmail'])->name('account.update.email');
Route::put('/account/update-password', [AccountController::class, 'updatePassword'])->name('account.update.password');

// ✅ إدارة الصور
Route::get('/account/photo', [PhotoController::class, 'edit'])->name('account.photo');
Route::post('/account/photo', [PhotoController::class, 'upload'])->name('account.photo.upload');
Route::delete('/account/photo', [PhotoController::class, 'delete'])->name('account.photo.delete');

// ✅ البحث
Route::get('/search', [SearchController::class, 'index'])->name('search');

// ✅ تسجيل
Route::get('/register', [RegisterController::class, 'create'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

// ✅ استعادة كلمة المرور
Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])->middleware('guest')->name('password.request');
Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])->middleware('guest')->name('password.email');
Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])->middleware('guest')->name('password.reset');
Route::post('/reset-password', [NewPasswordController::class, 'store'])->middleware('guest')->name('password.update');

// ✅ لوحة التحكم
Route::get('/dashboard', [HomeController::class, 'dashboard'])->middleware(['auth'])->name('dashboard');

// ✅ تسجيل دخول عبر فيسبوك/جوجل
Route::get('auth/{provider}', [SocialAuthController::class, 'redirectToProvider'])->name('social.redirect');
Route::get('auth/{provider}/callback', [SocialAuthController::class, 'handleProviderCallback'])->name('social.callback');

// ✅ إكمال الملف الشخصي
Route::middleware(['auth'])->group(function () {
    Route::get('/complete-profile', [ProfileCompletionController::class, 'showForm'])->name('profile.complete');
    Route::post('/complete-profile', [ProfileCompletionController::class, 'save']);
});

// ✅ جلب المدن حسب الدولة
Route::get('/get-cities/{country_id}', [LocationController::class, 'getCities']);
use App\Http\Controllers\Auth\LoginController;

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

use App\Models\City;

Route::get('/get-cities/{country_id}', function ($country_id) {
    return City::where('country_id', $country_id)->orderBy('name_ar')->get();
});



Route::get('/register', [RegisterController::class, 'create'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);
Route::get('/get-cities/{country_id}', [LocationController::class, 'getCities']);




Route::get('/get-cities/{country_id}', [LocationController::class, 'getCities']);
Route::get('/cities/{country_id}', [App\Http\Controllers\CityController::class, 'getCities']);


Route::get('/cities/{country_id}', [CityController::class, 'getCities']);


use App\Http\Controllers\StateController;

Route::get('/get-states/{country_id}', [StateController::class, 'getStates'])->name('get.states');

Route::get('/address/create', [AddressController::class, 'create'])->name('address.create');
Route::post('/address', [AddressController::class, 'store'])->name('address.store');
Route::get('/get-states/{country_id}', [AddressController::class, 'getStates']);


