@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="col-xs-12 col-md-2">
    <aside class="col-xs-12">
        <label class="col-xs-12">Music</label>
        <label class="col-xs-12">Exercise</label>
        <label class="col-xs-12">Body relaxation</label>
        <label class="col-xs-12">Creativity</label>
    </aside>
    </div>
    <div class="col-xs-12 col-md-7">
        <div class="col-xs-12">
            <label>Menu option</label>
            <img src="" alt="option-picture">

            <h2>Weightless - marconi Union</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A aut consectetur cum cupiditate deleniti deserunt esse hic id ipsa iusto nesciunt porro quae quo recusandae, reprehenderit sequi velit vero voluptas.</p>
            <div class="col-xs-12">
                play options
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-md-3">
        <div class="timer">
        <div id="countdownExample">
            <label> Remaining</label>
            <div class="values"></div>
        </div>
        </div>
        <div class="status">
            <label class="col-xs-12">Stress Measure Status</label>
            <label class="col-xs-6">User ID</label><label class="col-xs-6">324897243</label>
            <label class="col-xs-6">Smartphone</label><label class="col-xs-6">Connected</label>
            <label class="col-xs-6">Status</label><label class="col-xs-6">In-session</label>
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
