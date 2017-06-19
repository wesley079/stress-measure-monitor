@extends('layouts.app')

@section('content')
    <div class="container text-center">
        <h1>Session (high stress) - 19-06-2017</h1>
        <?php

        if($succes){
        ?>

        <h3 class="padding-top-20">Congratulations, you succesfully completed your relax session</h3>
        <label class="text-center col-xs-12">Below some stats about your behaviour. Wasn't that bad was it?</label>
        <?php
        }
        else {
            ?>
        <h3 class="padding-top-20">Too bad, you didn't make it.</h3>
        <label class="text-center col-xs-12">Try again!</label>
        <?php
        }
        ?>
        <div class="row text-center padding-top-100">
            <div class="col-xs-12 col-md-6">
                <label class="col-xs-12 big-number">{{ $aimed_time }}</label>
                <label class="col-xs-12">Aimed session</label>
            </div>
            <div class="col-xs-12 col-md-6">
                <label class="col-xs-12 big-number">{{ $time }}</label>
                <label class="col-xs-12">Real session</label>
            </div>
        </div>
        <div class="row text-center padding-top-100">
            <div class="col-xs-12 col-md-4">
                <label class="col-xs-12 big-number">{{ $screen_on_percentage }}%</label>
                <label class="col-xs-12">Screen on during session</label>
            </div>
            <div class="col-xs-12 col-md-4">
                <label class="col-xs-12 big-number">{{ $screen_unlock_amount }}</label>
                <label class="col-xs-12">Amount of screen unlocks</label>
            </div>
            <div class="col-xs-12 col-md-4">
                <label class="col-xs-12 big-number">{{ $screen_unlocked_seconds }}</label>
                <label class="col-xs-12">Total seconds unlocked screen</label>
            </div>
        </div>
        <div class="row text-center padding-top-50">
            <label class="col-xs-12 big-number"><?php if ($succes) {
                    echo 'Succesfull session';
                } else {
                    echo 'Session failed';
                } ?></label>
        </div>
    </div>
@endsection
