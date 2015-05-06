<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', array('uses' => 'ThesaurusController@index', 'as' => 'home'));
Route::get('/beseda/{word}', array('uses' => 'ThesaurusController@show', 'as' => 'show'));
Route::post('/word-relationships', array('uses' => 'ThesaurusController@storeRelationship', 'as' => 'store.relationship'));
Route::delete('/word-relationships', array('uses' => 'ThesaurusController@deleteRelationship', 'as' => 'delete.relationship'));
