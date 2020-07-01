<?php

use Illuminate\Http\Request;

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

Route::apiResource('/question', 'QuestionController');

Route::apiResource('/category', 'CategoryController');

Route::apiResource('/{question}/reply', 'ReplyController');

Route::post('/like/{reply}', 'LikeController@likeIt');
Route::post('/unlike/{reply}', 'LikeController@unLikeIt');

Route::post('notifications', 'NotificationController@index');
Route::post('markAsRead', 'NotificationController@markAsRead');


Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('signup', 'AuthController@signup');
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});
