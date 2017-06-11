@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Congratulations, you succesfully completed your relax session</h1>
        <label>Below some stats about your behaviour. Wasn't that bad was it?</label>


        <div class="row">
            <div class="col-xs-12 col-md-4">
                <label class="col-xs-12">21</label>
                <label class="col-xs-12">Missed notifications</label>
            </div>
            <div class="col-xs-12 col-md-4">
                <label class="col-xs-12">stats</label>
                <label class="col-xs-12">Screen activity during session</label>
            </div>
            <div class="col-xs-12 col-md-4">
                <label>30</label><label>(+ 8)</label>
                <label class="col-xs-12">Minutes of relaxation</label>
            </div>
        </div>



        <div id="countdownExample">
            <div class="values"></div>
        </div>
    </div>
@endsection
