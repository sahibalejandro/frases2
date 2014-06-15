<?php
Route::group(['prefix' => 'api/v1'], function () {

    /**
     * Routes for sentences resources
     */
    Route::resource('sentences', 'SentencesAPIController', [
        'only' => ['index', 'store', 'show', 'update', 'destroy'],
    ]);

    Route::put('sentences/{sentence}/tags', [
        'as'   => 'api.sentence.tags',
        'uses' => 'SentenceTagsAPIController@update',
    ]);

    Route::put('sentences/{sentence}/vote', [
        'as'   => 'api.sentence.vote',
        'uses' => 'SentenceVoteAPIController@update',
    ]);

    /**
     * Routes for tag resources
     */
    Route::resource('tags', 'TagsAPIController', [
        'only' => ['index', 'store', 'show', 'update', 'destroy'],
    ]);

    /**
     * Routes for authors resources
     */
    Route::resource('authors', 'AuthorsAPIController', [
        'only' => ['index', 'store', 'show', 'update', 'destroy'],
    ]);

});