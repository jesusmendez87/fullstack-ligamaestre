<?php
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return response()->json(['msg' => 'API funcionando']);
});



Route::get('/login', function () {Route::get('/login', function () {
    return view('login');    return view('login');
}) ->name('login');  //pass password}) ->name('login');  //pass password
});

