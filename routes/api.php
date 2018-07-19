<?php

use Illuminate\Http\Request;



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => '/', 'namespace' => '', 'as' => 'api.'], function () {
    Route::resource('gallery', 'GalleryController');
});