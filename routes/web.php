<?php

use Illuminate\Support\Facades\Route;

Route::get('/login', function (){
    return view("auth.login");
})->name('login');

Route::middleware('auth')->group(function (){
    Route::get('/', \App\Livewire\Main::class);
    Route::get('/competitors', \App\Livewire\ComptetitorList::class);
    Route::get('/competitions/{id}', \App\Livewire\CompetitionInfoPage::class);
});

Route::post('/login', [\App\Http\Controllers\Auth\AuthController::class, 'authenticate']);

Route::get('/register', function(){
    return view("auth.register");
});
Route::post('/register', [\App\Http\Controllers\Auth\AuthController::class, 'register']);
Route::get('/logout', [\App\Http\Controllers\Auth\AuthController::class, 'logout']);

Route::any("{catchall}", function (){
    return "A keresett elem nem található.";
});
