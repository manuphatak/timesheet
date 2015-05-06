<?php

use Laravel\Lumen\Application;

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


$app->get('/',
          [
              'as' => 'home',
              function () {
                  return view('index');
              }
          ]);

$app->group(['prefix' => 'api'],
    function (Application $app) {
        $app->get('users',
                  [
                      'uses' => 'App\Http\Controllers\UserController@index',
                      'as'   => 'user.index'
                  ]);
        $app->get('time',
                  [
                      'uses' => 'App\Http\Controllers\TimeEntryController@index',
                      'as'   => 'time.index'
                  ]);
        $app->post('time',
                   [
                       'uses' => 'App\Http\Controllers\TimeEntryController@store',
                       'as'   => 'time.store'
                   ]);
        $app->put('time/{id}',
                  [
                      'uses' => 'App\Http\Controllers\TimeEntryController@update',
                      'as'   => 'time.update'
                  ]);
        $app->delete('time/{id}',
                  [
                      'uses' => 'App\Http\Controllers\TimeEntryController@destroy',
                      'as'   => 'time.destroy'
                  ]);

    });