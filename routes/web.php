<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/registerCode', 'postController@index');
Route::get('/checkConnectionCode', 'postController@checkConnectionCode');
Route::get('/checkCodeStatus', 'postController@checkCodeStatus');
Route::get('/checkAirplaneMode', 'postController@checkAirplaneMode');
Route::get('/sessionEnd', 'postController@sessionEnd');
Route::get('/endSession', 'postController@finishSession');
Route::get('/endSessionDesktop', 'postController@finishSessionDesktop');

Route::get('/new_session', 'SessionController@index');
Route::get('/end_session', 'SessionController@end');


Route::get('/connected_session', function () {
    return view('/sessions/session-step2');
});
Route::get('/current_session', function () {
    return view('/sessions/session-step3');
});

Route::get('/end_instruction_session', function () {
    return view('/sessions/session-instructions');
});



