<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\TrackController;

// Rotas para álbuns


Route::get('albums', [AlbumController::class, 'index']);
Route::post('albums', [AlbumController::class, 'store']);
Route::get('albums/{id}', [AlbumController::class, 'show']);
Route::put('albums/{id}', [AlbumController::class, 'update']);
Route::delete('albums/{id}', [AlbumController::class, 'destroy']);
Route::delete('/albums/{id}', [AlbumController::class, 'destroy']);
Route::get('albums/{id}/tracks', [AlbumController::class, 'tracks']);
Route::get('albums/search', [AlbumController::class, 'search']);
Route::get('albums/{album}/tracks', [TrackController::class, 'getTracksByAlbum']);
Route::delete('/albums/{albumId}/tracks/{id}', [TrackController::class, 'destroy']);

    


// Rotas para faixas
    Route::prefix('tracks')->group(function () {
    Route::get('/', [TrackController::class, 'index']);
    Route::post('/', [TrackController::class, 'store']);
    Route::get('/{id}', [TrackController::class, 'show']);
    Route::put('/{id}', [TrackController::class, 'update']);
    Route::delete('/{id}', [TrackController::class, 'destroy']);
    Route::get('tracks/search', [TrackController::class, 'search']);
    
});