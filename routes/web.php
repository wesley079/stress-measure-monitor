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
use App\session_data;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/registerCode', 'postController@index');
Route::get('/checkConnectionCode', 'PostController@checkConnectionCode');
Route::get('/checkCodeStatus', 'PostController@checkCodeStatus');
Route::get('/checkAirplaneMode', 'PostController@checkAirplaneMode');
Route::get('/sessionEnd', 'PostController@sessionEnd');
Route::get('/endSession', 'PostController@finishSession');
Route::get('/endSessionDesktop', 'PostController@finishSessionDesktop');

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
Route::get('/statistics', 'StatisticController@index');

Route::get('/statistics/connection/{id}', 'StatisticController@connection');


Route::get('/connect', function(){
    $pending = [];
    $connections = [];
    $requests = [];

    //fill pending
    $all = \App\authorization_session::where(array('user_granted' => \Illuminate\Support\Facades\Auth::user()->id))->get();
    foreach($all as $item){
        $user = \Illuminate\Foundation\Auth\User::where('id', $item->user_allower)->first();

        if($item->granted == null){
            array_push($pending, $user->name);
        }
        if($item->granted == 1){
            array_push($connections, [$user->name, $user->id]);
        }
    }

    //requests

    $all = \App\authorization_session::where(array('user_allower' => \Illuminate\Support\Facades\Auth::user()->id, 'granted' => null))->get();
    foreach ($all as $item){
        if($item->granted == null) {
            $user = \Illuminate\Foundation\Auth\User::where('id', $item->user_granted)->first();

            array_push($requests, [$user->name, $user->id]);

        }
    }


    //return view
    return view('/connect/overview', array('pending' => $pending, 'connections' => $connections, 'request' => $requests));
});

Route::get('/allowAuthorization/{id}/', function($id){
    $authorization = \App\authorization_session::where(array('user_allower' => \Illuminate\Support\Facades\Auth::user()->id, 'user_granted' => $id))->first();

    $authorization->granted = 1;
    $authorization->save();

    return back()->withInput();
});

Route::get('/disallowAuthorization/{id}/', function($id){
    $authorization = \App\authorization_session::where(array('user_allower' => \Illuminate\Support\Facades\Auth::user()->id, 'user_granted' => $id))->first();

    $authorization->delete();

    return back()->withInput();
});

Route::post('/addConnection', 'PostController@addContact');

Route::get('/statistics/detail/{session}/', function ($session) {
    $session = session_data::where(array('session_code' => $session, 'user_id' => Auth::user()->id))->first();

    $percentage = intval($session->screen_seconds / $session->time * 100);

    if($percentage > 100){
        $percentage = 100;
    }
    $hours = floor($session->aimed_time / 3600);
    $mins = floor($session->aimed_time / 60 % 60);
    $secs = floor($session->aimed_time % 60);
    $timeFormat = sprintf('%02d:%02d:%02d', $hours, $mins, $secs);

    $hours = floor($session->time / 3600);
    $mins = floor($session->time / 60 % 60);
    $secs = floor($session->time % 60);
    $realTime = sprintf('%02d:%02d:%02d', $hours, $mins, $secs);

    $succes = '';
    if($session->aimed_time <= $session->time){
        $succes = true;
    }

    return view('/statistics/detail', array('created' => $session->created_at ,'succes' => $succes ,'aimed_time' => $timeFormat, 'time' => $realTime, 'screen_on_percentage' => $percentage, 'screen_unlock_amount' => $session->screen_amount, 'screen_unlocked_seconds' => $session->screen_seconds));

});

Route::get('/statistics/connection/{id}/detail/{session}/', function ($usr_id, $session) {
    $session = session_data::where(array('session_code' => $session, 'user_id' => $usr_id))->first();

    $percentage = intval($session->screen_seconds / $session->time * 100);

    if($percentage > 100){
        $percentage = 100;
    }
    $hours = floor($session->aimed_time / 3600);
    $mins = floor($session->aimed_time / 60 % 60);
    $secs = floor($session->aimed_time % 60);
    $timeFormat = sprintf('%02d:%02d:%02d', $hours, $mins, $secs);

    $hours = floor($session->time / 3600);
    $mins = floor($session->time / 60 % 60);
    $secs = floor($session->time % 60);
    $realTime = sprintf('%02d:%02d:%02d', $hours, $mins, $secs);

    $succes = '';
    if($session->aimed_time <= $session->time){
        $succes = true;
    }

    return view('/statistics/detail_connection', array('created' => $session->created_at ,'succes' => $succes ,'aimed_time' => $timeFormat, 'time' => $realTime, 'screen_on_percentage' => $percentage, 'screen_unlock_amount' => $session->screen_amount, 'screen_unlocked_seconds' => $session->screen_seconds));

});



