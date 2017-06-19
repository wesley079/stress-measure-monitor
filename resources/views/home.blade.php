@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center">Hey, what do you want to do?</h1>


    <div class="row text-center">
        <a href="/new_session"><div class="col-xs-12 col-md-4">
                <i class="fa fa-mobile session-big-icon" aria-hidden="true"></i>
                <label class="title-span">New Session</label>
            </div></a>
        <a href="/statistics"><div class="col-xs-12 col-md-4">My statistics</div></a>
        <a href="/connect"><div class="col-xs-12 col-md-4">Connected accounts</div></a>
    </div>
</div>
@endsection
