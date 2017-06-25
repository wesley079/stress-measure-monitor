@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center">Hey, what do you want to do?</h1>


    <div class="row text-center">
        <a href="/new_session"><div class="col-xs-12 col-md-4 dashboard-item">
                <i class="fa fa-plus-circle dashboard-big-icon" aria-hidden="true"></i>
                <label class="title col-xs-12">New Session</label>
                <div class="specs col-xs-12">
                    <label class="col-xs-12">New relax session</label>
                </div>
            </div></a>
        <a href="/statistics"><div class="col-xs-12 col-md-4 dashboard-item">
                <i class="fa fa-line-chart dashboard-big-icon" aria-hidden="true"></i>
                <label class="title col-xs-12">My statistics</label>
                <div class="specs col-xs-12">
                    <label class="col-xs-12">See overall scores</label>
                    <label class="col-xs-12">Your sessions</label>
                </div>
            </div></a>
        <a href="/connect"><div class="col-xs-12 col-md-4 dashboard-item">
                <i class="fa fa-user dashboard-big-icon" aria-hidden="true"></i>
                <label class="title col-xs-12">Connected accounts</label>
                <div class="specs col-xs-12">
                    <label class="col-xs-12">View friends statistics</label>
                    <label class="col-xs-12">Add a new friend</label>
                    <label class="col-xs-12">Accept / Reject requests</label>
                </div>
            </div></a>
    </div>
</div>
@endsection
