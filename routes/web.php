<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PackageController as AdminPackageController;
use App\Http\Controllers\Admin\InquiryController as AdminInquiryController;
use App\Http\Controllers\Admin\TestimonialController as AdminTestimonialController;
use App\Http\Controllers\Admin\GalleryController as AdminGalleryController;
use App\Http\Controllers\Admin\SettingController as AdminSettingController;

// FRONTEND ROUTES
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/packages', [PackageController::class, 'index'])->name('packages.index');
Route::get('/packages/{slug}', [PackageController::class, 'show'])->name('packages.show');
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::post('/book-now', [ContactController::class, 'bookNow'])->name('book.now');
Route::post('/newsletter', [NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');
Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');

// ADMIN AUTH
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::middleware('admin')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        Route::resource('packages', AdminPackageController::class);
        Route::resource('inquiries', AdminInquiryController::class)->only(['index', 'show', 'destroy']);
        Route::post('inquiries/{inquiry}/mark-read', [AdminInquiryController::class, 'markRead'])->name('inquiries.mark-read');
        Route::post('inquiries/{inquiry}/reply', [AdminInquiryController::class, 'reply'])->name('inquiries.reply');
        Route::get('inquiries/export/csv', [AdminInquiryController::class, 'export'])->name('inquiries.export');

        Route::resource('testimonials', AdminTestimonialController::class);
        Route::resource('galleries', AdminGalleryController::class);

        Route::get('settings', [AdminSettingController::class, 'index'])->name('settings.index');
        Route::post('settings', [AdminSettingController::class, 'update'])->name('settings.update');
    });
});
