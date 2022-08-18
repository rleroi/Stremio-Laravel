<?php

use App\Http\Controllers\AddonController;
use Illuminate\Support\Facades\Route;

Route::get('/catalog/{type}/{id}.json', [AddonController::class, 'catalog']);
Route::get('/catalog/{type}/{id}/{extra}.json', [AddonController::class, 'catalog']);

Route::get('/meta/{type}/{id}.json', [AddonController::class, 'meta']);
Route::get('/meta/{type}/{id}/{extra}.json', [AddonController::class, 'meta']);

Route::get('/stream/{type}/{id}.json', [AddonController::class, 'stream']);
Route::get('/stream/{type}/{id}/{extra}.json', [AddonController::class, 'stream']);

Route::get('/subtitles/{type}/{id}.json', [AddonController::class, 'subtitles']);
Route::get('/subtitles/{type}/{id}/{extra}.json', [AddonController::class, 'subtitles']);

Route::get('/manifest.json', [AddonController::class, 'manifest']);
