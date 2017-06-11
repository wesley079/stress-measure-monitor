@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        correctIcon
    </div>
    <h1>Phone connected, keep your screen locked from now on</h1>


    <div class="row">
        <label>Preparing session</label>
    </div>

    <div id="countdownExample">
        <div class="values"></div>
    </div>
</div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <script src="/js/easytimer.js"></script>
    <script>

        var timer = new Timer();
        timer.start({countdown: true, startValues: {seconds: 30}});
        $('#countdownExample .values').html(timer.getTimeValues().toString());
        timer.addEventListener('secondsUpdated', function (e) {
            $('#countdownExample .values').html(timer.getTimeValues().toString());
        });
        timer.addEventListener('targetAchieved', function (e) {
            $('#countdownExample .values').html('Redirecting');
        });
    </script>
@endsection
