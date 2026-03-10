<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ConfigurationController;
use App\Http\Controllers\InstitutionalController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [InstitutionalController::class, 'index'])->name('institutional');

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Rutas de configuración del sitio
    Route::get('/configuration', [ConfigurationController::class, 'dashboard'])->name('configuration.dashboard');
    Route::post('/configuration/company', [ConfigurationController::class, 'saveCompany'])->name('configuration.company');
    Route::post('/configuration/analytics', [ConfigurationController::class, 'saveAnalytics'])->name('configuration.analytics');
    Route::post('/configuration/smtp', [ConfigurationController::class, 'saveSmtp'])->name('configuration.smtp');
    Route::post('/configuration/logo', [ConfigurationController::class, 'saveLogo'])->name('configuration.logo');
    Route::delete('/configuration/logo', [ConfigurationController::class, 'deleteLogo'])->name('configuration.logo.delete');
    Route::post('/configuration/image', [ConfigurationController::class, 'saveImage'])->name('configuration.image');
    Route::delete('/configuration/image/{type}', [ConfigurationController::class, 'deleteImage'])->name('configuration.image.delete');
    Route::post('/configuration/whatsapp', [ConfigurationController::class, 'saveWhatsapp'])->name('configuration.whatsapp');
    Route::post('/configuration/footer', [ConfigurationController::class, 'saveFooter'])->name('configuration.footer');
    Route::post('/configuration/companies', [ConfigurationController::class, 'saveCompanies'])->name('configuration.companies');
    Route::post('/configuration/sectors', [ConfigurationController::class, 'saveSectors'])->name('configuration.sectors');
    Route::post('/configuration/statistics', [ConfigurationController::class, 'saveStatistics'])->name('configuration.statistics');
    Route::post('/configuration/values', [ConfigurationController::class, 'saveValues'])->name('configuration.values');
    Route::post('/configuration/slider', [ConfigurationController::class, 'saveSlider'])->name('configuration.slider');
});

// Rutas de administración - protegidas con el middleware IsAdmin
Route::middleware(['auth', 'verified', 'is.admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/users', [AdminController::class, 'users'])->name('users');
    Route::get('/users/{user}/edit', [AdminController::class, 'editUser'])->name('users.edit');
    Route::patch('/users/{user}', [AdminController::class, 'updateUser'])->name('users.update');
    Route::delete('/users/{user}', [AdminController::class, 'deleteUser'])->name('users.delete');
    Route::post('/users/{user}/toggle-admin', [AdminController::class, 'toggleAdmin'])->name('users.toggle-admin');
    Route::get('/settings', [AdminController::class, 'settings'])->name('settings');
    Route::post('/settings', [AdminController::class, 'saveSettings'])->name('settings.save');
});

require __DIR__.'/auth.php';

