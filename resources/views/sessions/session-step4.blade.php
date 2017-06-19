@extends('layouts.app')

@section('content')
    <div class="container text-center">
        <h1>Session (high stress) - 19-06-2017</h1>
        <h3 class="padding-top-20">Congratulations, you succesfully completed your relax session</h3>
        <label class="text-center col-xs-12">Below some stats about your behaviour. Wasn't that bad was it?</label>


        <div class="row text-center padding-top-100">
            <div class="col-xs-12 col-md-4">
                <label class="col-xs-12 big-number">21%</label>
                <label class="col-xs-12">Screen on during session</label>
            </div>
            <div class="col-xs-12 col-md-4">
                <label class="col-xs-12 big-number">5</label>
                <label class="col-xs-12">Amount of screen unlocks</label>
            </div>
            <div class="col-xs-12 col-md-4">
                <label class="col-xs-12 big-number">85</label>
                <label class="col-xs-12">Total seconds unlocked screen</label>
            </div>
        </div>
        <div class="row text-center padding-top-50">
                <label class="col-xs-12 big-number">Succesfull session</label>
        </div>
    </div>
@endsection
