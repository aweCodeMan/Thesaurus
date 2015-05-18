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
Route::get('/sopomenke', array('uses' => 'ThesaurusController@synonyms', 'as' => 'synonyms'));
Route::get('/protipomenke', array('uses' => 'ThesaurusController@antonyms', 'as' => 'antonyms'));
Route::get('/beseda/{word}', array('uses' => 'ThesaurusController@show', 'as' => 'show'));
Route::get('/pomoc', array('uses' => 'ThesaurusController@faq', 'as' => 'faq'));
Route::post('/word-relationships', array('uses' => 'ThesaurusController@storeRelationship', 'as' => 'store.relationship'));
Route::delete('/word-relationships', array('uses' => 'ThesaurusController@deleteRelationship', 'as' => 'delete.relationship'));

Route::get('/sitemap',  array('uses' => 'SitemapController@index'));
Route::get('/sitemap/{id}', array('uses' => 'SitemapController@show'));