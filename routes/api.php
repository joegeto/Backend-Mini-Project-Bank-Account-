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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('accounts/{account}/balance', ['uses' => 'AccountController@balance', 'as' => 'accounts.balance']);
Route::post('accounts/{account}/deposit', ['uses' => 'AccountController@deposit', 'as' => 'accounts.deposit']);
Route::post('accounts/{account}/withdraw', ['uses' => 'AccountController@withdraw', 'as' => 'accounts.withdraw']);
Route::resource('accounts', 'AccountController', [
    'only' => ['store']
]);
