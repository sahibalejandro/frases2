<?php
Route::group(['prefix' => 'api'], function () {
    Route::resource('sentences', 'SentencesAPIController', [
        'only' => ['index', 'store', 'show', 'update', 'destroy']
    ]);
    Route::resource('tags', 'TagsAPIController', [
        'only' => ['index', 'store', 'show', 'update', 'destroy']
    ]);
});