@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row ">
        <i class="fa fa-mobile session-big-icon" aria-hidden="true"></i>

        <h1 class="session-big-title">Please start {{ config('app.name', 'Stress Measure Monitor') }} on your smartphone and follow the instructions</h1>
    </div>



    <div class="row">
        <div class="col-xs-12 id-icon"><i class="fa fa-user" aria-hidden="true"></i></div>
        <label class="col-xs-12 session-code-title">Your unique ID</label>
        <label id="session_code" class="col-xs-12 session-code"><?= $code ?></label>
    </div>

    <div id="countdownExample">
        <div class="values"></div>
    </div>
</div>
@endsection
