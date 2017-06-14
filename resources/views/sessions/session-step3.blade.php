@extends('layouts.app')

@section('content')
        <aside class="session-menu">
            <label class="col-xs-12 active option">Music</label>
            <label class="col-xs-12 option">Exercise</label>
            <label class="col-xs-12 option">Body relaxation</label>
            <label class="col-xs-12 option">Creativity</label>
        </aside>
<div class="container-fluid">

    <div class="col-md-offset-2 col-xs-12 col-md-8">
        <div class="col-xs-12 inspiration-container">
            <img class="option-picture col-xs-12" src="/img/Weightless-Endless.png" alt="option-picture">
            <label class="menu-title">Music</label>

            <h2 class="inspiration-title col-xs-12">Weightless - Marconi Union</h2>
            <p class="inspiration-description col-xs-10 col-xs-offset-1">Weightless is chosen as most relaxing song. Enjoy the free moment, play weightless by Marconi Union.</p>
            <div class="col-xs-12 play-container">
                <a href="https://open.spotify.com/track/6kkwzB6hXLIONkEk9JciA6" target="_blank"><img src="/img/spotify-play.png" class="spotify-play-button" alt="play this song on Spotify"/></a>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-md-2">
        <div class="timer">
        <div id="countdownExample">
            <label> Remaining</label>
            <div class="values session-screen-values"></div>
        </div>
        </div>
        <div class="status">
            <label class="col-xs-12 title">Stress Measure Status</label>
            <label class="col-xs-6 left-option">User ID</label><label class="col-xs-6 right-option">{{session()->get('code')}}</label>
            <label class="col-xs-6 left-option">Smartphone</label><label class="col-xs-6 right-option">Connected</label>
            <label class="col-xs-6 left-option">Status</label><label class="col-xs-6 right-option">In-session</label>
        </div>

    </div>

</div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <script src="/js/easytimer.js"></script>
    <script>

        var timer = new Timer();
        timer.start({countdown: true, startValues: {minutes: 30, seconds: 30}});
        $('#countdownExample .values').html(timer.getTimeValues().toString());
        timer.addEventListener('secondsUpdated', function (e) {
            $('#countdownExample .values').html(timer.getTimeValues().toString());
        });
        timer.addEventListener('targetAchieved', function (e) {
            $('#countdownExample .values').html('Redirecting');
        });
    </script>
@endsection
