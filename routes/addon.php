<?php

use App\Http\Controllers\AddonController;
use Illuminate\Support\Facades\Route;

Route::middleware('addon')->group(function () {
    // Manifest endpoint
    Route::get('/manifest.json', [AddonController::class, 'manifest']);
    Route::get('/{config}/manifest.json', [AddonController::class, 'manifest']);

    // Catalog endpoints
    Route::get('/catalog/{type}/{id}.json', [AddonController::class, 'catalog']);
    Route::get('/catalog/{type}/{id}/{extra}.json', [AddonController::class, 'catalog']);
    Route::get('/{config}/catalog/{type}/{id}.json', [AddonController::class, 'catalog']);
    Route::get('/{config}/catalog/{type}/{id}/{extra}.json', [AddonController::class, 'catalog']);

    // Meta endpoints
    Route::get('/meta/{type}/{id}.json', [AddonController::class, 'meta']);
    Route::get('/meta/{type}/{id}/{extra}.json', [AddonController::class, 'meta']);
    Route::get('/{config}/meta/{type}/{id}.json', [AddonController::class, 'meta']);
    Route::get('/{config}/meta/{type}/{id}/{extra}.json', [AddonController::class, 'meta']);

    // Stream endpoints
    Route::get('/stream/{type}/{id}.json', [AddonController::class, 'stream']);
    Route::get('/stream/{type}/{id}/{extra}.json', [AddonController::class, 'stream']);
    Route::get('/{config}/stream/{type}/{id}.json', [AddonController::class, 'stream']);
    Route::get('/{config}/stream/{type}/{id}/{extra}.json', [AddonController::class, 'stream']);

    // Subtitles endpoints
    Route::get('/subtitles/{type}/{id}.json', [AddonController::class, 'subtitles']);
    Route::get('/subtitles/{type}/{id}/{extra}.json', [AddonController::class, 'subtitles']);
    Route::get('/{config}/subtitles/{type}/{id}.json', [AddonController::class, 'subtitles']);
    Route::get('/{config}/subtitles/{type}/{id}/{extra}.json', [AddonController::class, 'subtitles']);
});
