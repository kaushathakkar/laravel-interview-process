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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['namespace' => 'Api'], function (){
    Route::group(['prefix' => '/jobs'], function () {
      Route::get('/activejobs', 'JobController@getJobs');
      Route::get('/todays-interviews', 'JobController@getInterviews');
      //Route::get('/selected-candidates', 'JobController@getSelectedCandidates');
      Route::post('/add-followup', 'JobController@postFollowup');
      Route::post('/schedule-interview', 'JobController@postSetInterview');
    });
  });