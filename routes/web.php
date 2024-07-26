<?php

use App\Http\Controllers\AssetController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VoertuigController;

Route::get('/dashboard', [VoertuigController::class, 'index'])->name('dashboard');
Route::post('/voertuigen', [VoertuigController::class, 'store'])->name('voertuigen.store');
Route::get('/voertuigen/create', [VoertuigController::class, 'create'])->name('voertuigen.create');
Route::put('/voertuigen/{id}', [VoertuigController::class, 'update'])->name('voertuigen.update');
Route::get('/voertuigen/{id}/edit', [VoertuigController::class, 'edit'])->name('voertuigen.edit');
Route::delete('/voertuigen/{id}', [VoertuigController::class, 'destroy'])->name('voertuigen.destroy');

Route::get('storage/{path}', AssetController::class)->where('path', '.*');