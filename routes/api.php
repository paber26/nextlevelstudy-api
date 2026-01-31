<?php

use Illuminate\Support\Facades\Route;
// /Users/bernaldonapitupulu/Documents/Next Level Study/nextlevelstudy-api/app/Http/Controllers/api/AuthController.php
// use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BankSoalController;
use App\Http\Controllers\Api\TryoutController;
// use app/Http/Controllers/api/AuthController.php
use Illuminate\Http\Request;
use App\Models\Mapel;

Route::get('/ping', function () {
    return response()->json([
        'success' => true,
        'message' => 'API connected'
    ]);
}); 

Route::get('/auth/google', [AuthController::class, 'redirectToGoogle']);
Route::get('/auth/google/callback', [AuthController::class, 'handleGoogleCallback']);

Route::middleware('auth:sanctum')->get('/me', function (Request $request) {
    return $request->user();
});

// Route::apiResource('banksoal', BankSoalController::class);
Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('banksoal', BankSoalController::class);
    Route::get('/mapel', function () {
        return Mapel::select('id', 'nama', 'tingkat')->orderBy('nama')->get();
    });
    Route::post('/banksoal', [BankSoalController::class, 'store']);
});

Route::get('/banksoal/{id}', [BankSoalController::class, 'show']);
Route::put('/banksoal/{id}', [BankSoalController::class, 'update']);

Route::get('/tryout', [TryoutController::class, 'index']);