<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('repositories', 'RepositoryController@index');
Route::group(['prefix' => 'respository'], function () {
    Route::post('store', 'RepositoryController@store');
    Route::get('show/{id}', 'RepositoryController@show');
    Route::get('showgit/{id}', 'RepositoryController@showgit');
    Route::delete('delete/{id}', 'RepositoryController@delete');
});
