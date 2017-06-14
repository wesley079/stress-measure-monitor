<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\activeCode;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        date_default_timezone_set('Europe/Amsterdam');

        $connectionCode;
        //get codes
        $dbCode = activeCode::where(array('user_id' => Auth::user()->id))->first();

        if ($dbCode != null)
        {
            $connectionCode = $dbCode->code;
        }
        else{

            $new_code = new activeCode();
            $randomCode = $this->getToken(8);
            $new_code->code = $randomCode;
            $new_code->user_id = Auth::user()->id;
            $new_code->save();

            $connectionCode = $randomCode;
        }
        session()->put('code', $connectionCode);
        return view('/sessions/session-step1', array('code' => $connectionCode));
    }

    private function crypto_rand_secure($min, $max)
    {
        $range = $max - $min;
        if ($range < 1) return $min; // not so random...
        $log = ceil(log($range, 2));
        $bytes = (int) ($log / 8) + 1; // length in bytes
        $bits = (int) $log + 1; // length in bits
        $filter = (int) (1 << $bits) - 1; // set all lower bits to 1
        do {
            $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
            $rnd = $rnd & $filter; // discard irrelevant bits
        } while ($rnd > $range);
        return $min + $rnd;
    }

    private function getToken($length)
    {
        $token = "";
        $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
        $codeAlphabet.= "0123456789";
        $max = strlen($codeAlphabet); // edited

        for ($i=0; $i < $length; $i++) {
            $token .= $codeAlphabet[$this->crypto_rand_secure(0, $max-1)];
        }

        return $token;
    }
}
