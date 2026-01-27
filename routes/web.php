<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GeneralController;

Route::get('/', [GeneralController::class, 'home'])->name('home');
Route::get('/nosotros', [GeneralController::class, 'aboutUs'])->name('about-us');
Route::get('/servicios', [GeneralController::class, 'services'])->name('services');
Route::get('/productos', [GeneralController::class, 'products'])->name('products');
Route::get('/tips', [GeneralController::class, 'tips'])->name('tips');
Route::get('/contacto', [GeneralController::class, 'contact'])->name('contact');