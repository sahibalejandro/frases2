<?php
Route::group(['prefix' => 'api'], function () {
    Route::resource('authors', 'AuthorsAPIController', [
        'only' => ['index', 'store', 'show', 'update', 'destroy']
    ]);
    Route::resource('tags', 'TagsAPIController', [
        'only' => ['index', 'store', 'show', 'update', 'destroy']
    ]);
});