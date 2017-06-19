<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\session_data;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;



class StatisticController extends Controller
{
    public function index(){
       $sessions =  Session_data::where(array('user_id' => Auth::user()->id))->orderBy('created_at', 'desc')->get();
        if($sessions != null) {
            $time_spend = 0;
            foreach ($sessions as $session) {
                $time_spend += $session["time"];
            }


            $screenOpen = 0;

            foreach ($sessions as $session) {
                $screenOpen += $session["screen_seconds"];
            }

            if($screenOpen != 0 || $time_spend != 0){
                $screenOpen = intval($screenOpen / $time_spend * 100);
            }


            $hours = floor($time_spend / 3600);
            $mins = floor($time_spend / 60 % 60);
            $secs = floor($time_spend % 60);
            $time_spend = sprintf('%02d:%02d:%02d', $hours, $mins, $secs);


            $time_aim = 0;
            foreach ($sessions as $session) {
                $time_aim += $session["aimed_time"];
            }

            $hours = floor($time_aim / 3600);
            $mins = floor($time_aim / 60 % 60);
            $secs = floor($time_aim % 60);
            $time_aim = sprintf('%02d:%02d:%02d', $hours, $mins, $secs);

            $screen_unlocks = 0;
            foreach ($sessions as $session) {
                $screen_unlocks += $session["screen_amount"];
            }

            if ($screenOpen > 100) {
                $screenOpen = 100;
            }
            return view('/statistics/dashboard', array('percentage' => $screenOpen, 'totalTime' => $time_spend, 'aimedTime' => $time_aim, 'unlocks' => $screen_unlocks, 'sessions' => (object)$sessions));

        }
        return back()->withInput();

    }

    public function connection($id){
        $sessions =  Session_data::where(array('user_id' => $id))->orderBy('created_at', 'desc')->get();
        if($sessions != null) {
            $time_spend = 0;
            foreach ($sessions as $session) {
                $time_spend += $session["time"];
            }


            $screenOpen = 0;

            foreach ($sessions as $session) {
                $screenOpen += $session["screen_seconds"];
            }

            if($screenOpen != 0 || $time_spend != 0){
                $screenOpen = intval($screenOpen / $time_spend * 100);
            }


            $hours = floor($time_spend / 3600);
            $mins = floor($time_spend / 60 % 60);
            $secs = floor($time_spend % 60);
            $time_spend = sprintf('%02d:%02d:%02d', $hours, $mins, $secs);


            $time_aim = 0;
            foreach ($sessions as $session) {
                $time_aim += $session["aimed_time"];
            }

            $hours = floor($time_aim / 3600);
            $mins = floor($time_aim / 60 % 60);
            $secs = floor($time_aim % 60);
            $time_aim = sprintf('%02d:%02d:%02d', $hours, $mins, $secs);

            $screen_unlocks = 0;
            foreach ($sessions as $session) {
                $screen_unlocks += $session["screen_amount"];
            }

            if ($screenOpen > 100) {
                $screenOpen = 100;
            }
            return view('/statistics/connection_dashboard', array('connection_id' => $id, 'percentage' => $screenOpen, 'totalTime' => $time_spend, 'aimedTime' => $time_aim, 'unlocks' => $screen_unlocks, 'sessions' => (object)$sessions));

        }
        return back()->withInput();
    }
}
