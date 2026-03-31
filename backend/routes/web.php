<?php
use App\Http\Controllers\ClubController;
use Illuminate\Support\Facades\Route;



Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('clubes/create', [ClubController::class, 'create'])->name('clubes.create');
    Route::get('clubes/{club}/edit', [ClubController::class, 'edit'])->name('clubes.edit');
    Route::post('clubes', [ClubController::class, 'store'])->name('clubes.store');
    Route::put('clubes/{club}', [ClubController::class, 'update'])->name('clubes.update');
    Route::delete('clubes/{club}', [ClubController::class, 'destroy'])->name('clubes.destroy');
});


Route::get('/login', function () {
    return view('login');
}) ->name('login');  //pass password

require __DIR__.'/auth.php';

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');  //pass password


 Route::get('club/nuevoclub', function () {
    return view('club.nuevoclub');
 }
 );


 Route::get('club/exito', function () {
    return view('club.exito');
 }
 ) ->name('club.exito');
