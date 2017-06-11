@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        Smartphoneicon
    </div>
    <h1>Please start {{ config('app.name', 'Stress Measure Monitor') }} on your smartphone and follow the instructions</h1>



    <div class="row">
        <div>Personicon</div>
        <label>Your code</label>
        <label>33529reag</label>
    </div>

    <div id="countdownExample">
        <div class="values"></div>
    </div>
</div>
@endsection
