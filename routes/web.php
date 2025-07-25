<?php
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Provider\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (auth()->check()) {
        if (auth()->user()->role === 'provider') {
            return redirect()->route('provider.dashboard');
        } else {
            return redirect()->route('dashboard');
        }
    }
    return view('dashboard'); // Show dashboard for guests too
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'user'])->name('dashboard');

Route::middleware(['auth', 'user'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Provider routes
Route::middleware(['auth', 'provider'])->prefix('provider')->name('provider.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/jobs', [DashboardController::class, 'store'])->name('jobs.store');
    Route::delete('/jobs/{job}', [DashboardController::class, 'destroy'])->name('jobs.destroy');
    Route::post('/jobs/{job}/toggle-status', [DashboardController::class, 'toggleStatus'])->name('jobs.toggle-status');
});

require __DIR__ . '/auth.php';
