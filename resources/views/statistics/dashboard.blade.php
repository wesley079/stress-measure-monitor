@extends('layouts.app')

@section('content')
    <div class="container text-center">
        <div class="container-fluid">
            <div class="col-md-5">
                <h2>Overall score</h2>

                <label class="big-number col-xs-12 padding-top-20">
                    {{$totalTime}}
                </label>
                <label class="col-xs-12 ">Total time spend relaxing</label>
                <label class="big-number col-xs-12 padding-top-20">
                    {{$aimedTime}}
                </label>
                <label class="col-xs-12 ">Aimed time to spend relaxing</label>
                <label class="big-number col-xs-12 padding-top-20">
                    {{$unlocks }}
                </label>
                <label class="col-xs-12 ">Amount of screen unlocks</label>
                <label class="big-number col-xs-12 padding-top-20">
                    {{$percentage}}%
                </label>
                <label class="col-xs-12 ">Active screen during sessions</label>

            </div>
            <div class="col-md-7">
                <h2>Your sessions</h2>
                <ul>
                <?php
                    foreach ($sessions as $session){
                        ?>
                    <li>Session - <?= $session->created_at ?> - <a href="/statistics/detail/<?= $session->session_code?>" class="session-data-url">View session data</a></li>
                    <?php
                    }
                ?>
                </ul>
            </div>
        </div>
    </div>
@endsection
