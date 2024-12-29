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
            return redirect()->route('admin');
        }

        if ($user->hasRole('office staff')) {
            return redirect()->route('office.dashboard');
        }

        if ($user->hasRole('finance staff')) {
            return redirect()->route('finance.dashboard');
        }

        // Default to applicant dashboard
        return redirect()->route('dashboard');
    })->name('dashboard');

    // Admin dashboard route
    Route::get('/admin/dashboard', function () {
        return view('admin-dashboard');
    })->name('admin');

    // Office staff dashboard route
    Route::get('/office/dashboard', function () {
        return view('office.dashboard');
    })->name('office.dashboard');

    // Finance staff dashboard route
    Route::get('/finance/dashboard', function () {
        return view('finance.dashboard');
    })->name('finance.dashboard');

    // Applicant dashboard route
    Route::get('/applicant/dashboard', function () {
        return view('applicant.dashboard');
    })->name('applicant.dashboard');
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/permissions', function () {
        return view('permissions');
    })->name('permissions');
});