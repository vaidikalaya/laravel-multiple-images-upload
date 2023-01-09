<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{ImagesController};

Route::get('/', function () {
    return view('welcome');
});

Route::post('/upload-image',[ImagesController::class,'uploadImage']);
