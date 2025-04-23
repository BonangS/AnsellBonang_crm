<?php

use App\Http\Controllers\LeadController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

// Halaman login (GET)
Route::get('/', function () {
    return view('login');
})->name('login');

// Proses login (POST)
Route::post('/', function (Request $request) {
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->intended('/dashboard');
    }

    return back()->with('error', 'Email atau password salah.');
});

// Middleware untuk memeriksa autentikasi
Route::middleware(['auth'])->group(function () {
    
    // Halaman dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Hanya Manager yang bisa mengakses project
    Route::get('/projects', function () {
        // Cek apakah user yang sedang login memiliki role 'MANAGER'
        if (Auth::check() && Auth::user()->role === 'MANAGER') {
            return view('projects.index');  // Tampilkan halaman project jika role MANAGER
        }

        // Redirect ke dashboard dengan pesan error jika bukan Manager
        return redirect('/dashboard')->with('error', 'Akses ditolak. Anda bukan Manager.');
    })->name('projects.index');

    // Routes untuk leads,layanan,project,customer
    Route::resource('leads', LeadController::class);
    Route::resource('layanan', LayananController::class);
    Route::get('/layanan', [LayananController::class, 'index'])->name('layanan.index');
    Route::get('/customer', [CustomerController::class, 'index'])->name('customer.index');
    Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
    Route::post('/leads/{id}/approve', [ProjectController::class, 'approve'])->name('projects.approve');
    Route::post('/projects/{id}/reject', [ProjectController::class, 'reject'])->name('projects.reject');
    Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');

    

});

// Logout
Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/');
})->name('logout');







