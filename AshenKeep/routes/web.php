<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;

$url = config('app.url');
URL::forceRootUrl($url);

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        $user = Auth::user();

        if ($user->hasRole('Admin')) {
            return redirect()->route('admin.dashboard');
        }

        if ($user->hasRole('Office Staff')) {
            return redirect()->route('office-staff.dashboard');
        }

        if ($user->hasRole('Finance Staff')) {
            return redirect()->route('finance-staff.dashboard');
        }

        // Default to applicant dashboard
        return redirect()->route('applicant.dashboard');
    })->name('dashboard');

    // Admin dashboard route
    Route::get('/admin/dashboard', function () {
        return view('admin-dashboard');
    })->name('admin.dashboard');

    // Office staff dashboard route
    Route::get('/office/dashboard', function () {
        return view('office-staff-dashboard');
    })->name('office-staff.dashboard');

    // Finance staff dashboard route
    Route::get('/finance/dashboard', function () {
        return view('finance-staff-dashboard');
    })->name('finance-staff.dashboard');

    // Applicant dashboard route
    Route::get('/applicant/dashboard', function () {
        return view('applicant-dashboard');
    })->name('applicant.dashboard');
});