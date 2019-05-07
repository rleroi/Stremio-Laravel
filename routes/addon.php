<?php

use Illuminate\Http\Request;

Route::group(['middleware' => 'addon'], function() {
    Route::get('/catalog/{type}/{id}.json', 'AddonController@catalog');
    Route::get('/catalog/{type}/{id}/{extra}.json', 'AddonController@catalog');
    
    Route::get('/meta/{type}/{id}.json', 'AddonController@meta');
    Route::get('/meta/{type}/{id}/{extra}.json', 'AddonController@meta');
    
    Route::get('/stream/{type}/{id}.json', 'AddonController@stream');
    Route::get('/stream/{type}/{id}/{extra}.json', 'AddonController@stream');
    
    Route::get('/subtitles/{type}/{id}.json', 'AddonController@subtitles');
    Route::get('/subtitles/{type}/{id}/{extra}.json', 'AddonController@subtitles');

    Route::get('/manifest.json', 'AddonController@manifest');
});