<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\RequirementController;

$url = config('app.url');
URL::forceRootUrl($url);

Route::middleware('guest')->get('/', function () {
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


// User accessing Admin page check
Route::get('/admin/requirements', function () {
    $user = Auth::user();

    // authentication check
    if (!$user || !$user->hasRole('Admin')) {
        abort(403); // Forbidden
    }

    return view('admin_requirements');
})->middleware('auth');

Route::get('/admin/vault', function () {
    $user = Auth::user();

    // authentication check
    if (!$user || !$user->hasRole('Admin')) {
        abort(403); // Forbidden
    }

    return view('admin_vault');
})->middleware('auth');

// User accessing Office Staff page check
Route::get('/officestaff/applications', function () {
    $user = Auth::user();

    // authentication check
    if (!$user || !$user->hasRole('Office Staff')) {
        abort(403); // Forbidden
    }

    return view('officestaff-application');
})->middleware('auth');

Route::get('/officestaff/requirements', function () {
    $user = Auth::user();

    // Explicit authentication check
    if (!$user || !$user->hasRole('Office Staff')) {
        abort(403); // Forbidden
    }

    return view('officestaff_requirements');
})->middleware('auth');

// User accessing Applicant page check
Route::get('/applicant/apply', function () {
    $user = Auth::user();

    // authentication check
    if (!$user || !$user->hasRole('Applicant')) {
        abort(403); // Forbidden
    }

    return view('apply');
})->middleware('auth');

Route::get('/applicant/vault', function () {
    $user = Auth::user();

    // authentication check
    if (!$user || !$user->hasRole('Applicant')) {
        abort(403); // Forbidden
    }

    return view('applicant_vault');
})->middleware('auth');

Route::get('/applicant/requirements', function () {
    $user = Auth::user();

    // Explicit authentication check
    if (!$user || !$user->hasRole('Applicant')) {
        abort(403); // Forbidden
    }

    return view('applicant_requirements');
})->middleware('auth');

Route::get('/applicant/submission', function () {
    $user = Auth::user();

    // Explicit authentication check
    if (!$user || !$user->hasRole('Applicant')) {
        abort(403); // Forbidden if not an admin
    }

    return view('submission_requirements');
})->middleware('auth');

Route::post('/apply/save', [ApplicantController::class, 'savePage1'])->name('applicant.savePage1');
Route::get('/applicant/step-2', [ApplicantController::class, 'page2'])->name('applicant.page2');
Route::post('/apply/step-2/save', [ApplicantController::class, 'savePage2'])->name('applicant.savePage2');
Route::get('/apply/step-3', [ApplicantController::class, 'page3'])->name('applicant.page3');
Route::post('/apply/step-3/save', [ApplicantController::class, 'savePage3'])->name('applicant.savePage3');
Route::get('/apply/step-4', [ApplicantController::class, 'page4'])->name('applicant.page4');
Route::post('/apply/step-4/save', [ApplicantController::class, 'savePage4'])->name('applicant.savePage4');
Route::get('/apply/step-5', [ApplicantController::class, 'page5'])->name('applicant.page5');
Route::post('/apply/step-5/save', [ApplicantController::class, 'savePage5'])->name('applicant.savePage5');
Route::get('/apply/success', [ApplicantController::class, 'success'])->name('applicant.success');
Route::get('/applicants', [ApplicantController::class, 'index'])->name('applicant.index');

Route::get('/applicant/requirements', [RequirementController::class, 'index'])->name('applicant_requirements');
Route::post('/applicant/submission', [RequirementController::class, 'store'])->name('submission_requirements');