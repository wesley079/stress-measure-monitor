<?php

namespace App\Http\Controllers;

use App\activeCode;
use App\session_data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        date_default_timezone_set('Europe/Amsterdam');
        $code = $_GET["code"];


        //get codes
        $dbCode = activeCode::where(array('code' => $code))->first();

        if ($dbCode != null)
        {
            echo 'update';
            $dbCode->updated_at = date("Y-m-d H:i:s");
            $dbCode->save();
        }
        else{
            //doesn't exist yet

            $new_code = new activeCode();
            $new_code->code = $code;
            $new_code->save();
        }
    }

    public function checkCodeStatus(){
        date_default_timezone_set('Europe/Amsterdam');
        $code = $_GET["code"];
        $dbCode = activeCode::where(array('code' => $code))->first();

        if($dbCode != null){
            if($dbCode->connected == 1){
                return 'connected';
            }
        }

        return 'nothing';
    }

    public function checkAirplaneMode(){
        date_default_timezone_set('Europe/Amsterdam');
        $code = $_GET["code"];
        $dbCode = activeCode::where(array('code' => $code))->first();

        if($dbCode != null){
            $lastRegister = $dbCode->updated_at;
            
            if(strtotime(date_add($lastRegister, date_interval_create_from_date_string('30 seconds'))) < strtotime(date('Y-m-d H:i:s'))){
               return 'correct';
            }
        }
        
        return "waiting";
    }
    

    public function sessionEnd(){
        date_default_timezone_set('Europe/Amsterdam');
        $code = $_GET["code"];
        $dbCode = activeCode::where(array('code' => $code))->first();

        if($dbCode != null){
            $lastRegister = $dbCode->updated_at;

            if($dbCode->end == 1){
                return 'correct';
            }
        }

        return "waiting";
    }

    public function finishSession(){
        date_default_timezone_set('Europe/Amsterdam');

        $code = $_GET["code"];
        $seconds = $_GET["seconds"];
        $screen_on = $_GET["screen"];

        //get codes
        $dbCode = activeCode::where(array('code' => $code))->first();

        if ($dbCode != null)
        {
            $dbCode->updated_at = date("Y-m-d H:i:s");
            $dbCode->connected = 1;
            $dbCode->end = 1;
            $dbCode->save();

            //create new session data
            $session = new session_data();
            
            $session->session_code = $code;
            $session->screen_amount = $screen_on;
            $session->screen_seconds = $seconds;

            $session->save();

            return "true";
        }
        else{
            return "false";
        }
    }

    public function finishSessionDesktop(){
        date_default_timezone_set('Europe/Amsterdam');

        $code = $_GET["code"];
        $time = $_GET["time"];
        $aimed = $_GET["aimed"];

        //get codes
        $dbCode = activeCode::where(array('code' => $code))->first();

        if ($dbCode != null)
        {
            $dbCode->updated_at = date("Y-m-d H:i:s");
            $dbCode->connected = 1;
            $dbCode->end = 1;
            $dbCode->save();


            $session = session_data::where(array('session_code' => $code))->first();
            
            //update data
            $session->updated_at = date("Y-m-d H:i:s");
            $session->user_id = Auth::user()->id;
            $session->time = $time;
            $session->aimed_time = $aimed;


            $session->save();

            return "correct";
        }
        else{
            return "false";
        }
    }
    
    public function checkConnectionCode(){
        date_default_timezone_set('Europe/Amsterdam');
        $code = $_GET["code"];


        //get codes
        $dbCode = activeCode::where(array('code' => $code))->first();

        if ($dbCode != null)
        {
            $dbCode->updated_at = date("Y-m-d H:i:s");
            $dbCode->connected = 1;
            if(isset($_GET['end']) && $_GET['end'] == "true"){
                $dbCode->end = 1;
            }
            else{
                $dbCode->end = 0;
            }
            $dbCode->save();

            return "true";
        }
        else{
           return "false";
        }
    }
}
