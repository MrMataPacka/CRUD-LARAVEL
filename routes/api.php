<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\AtTown;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::get('/towns/{staid}', function ($staid) {
    return AtTown::where('staid', $staid)->orderBy('name')->get(['towid', 'name']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
