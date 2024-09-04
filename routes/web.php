<?php
#“मंज़िल उन्हीं को मिलती है जिनके सपनों में जान होती है, पंख से कुछ नहीं होता हौसलों से उड़ान होती है।”
use App\Http\Controllers\AdminStores;
use App\Http\Controllers\AdminViews;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/logoutuser', function () {
    Auth::logout();
    return redirect()->route('login');
})->name('logoutuser');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('AdminPanel.dashboard');
    })->name('dashboard');
});



//Admin Panel Views Routes
Route::controller(AdminViews::class)->group(function() {
    Route::get('userregister', 'userregister')->name('userregister');
});


//Admin Panel Store Routes
Route::controller(AdminStores::class)->group(function() {
    Route::post('insertregisterusers', 'insertregisterusers')->name('insertregisterusers');
});
