@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <i class="fa fa-check session-big-icon" aria-hidden="true"></i>

    </div>
    <h1 class="session-big-title">Phone connected, waiting for session to be loaded.</h1>

    <div class="session-connect-options">
        <div class="hidden" id="session_code"><?= session()->get('code');?></div>
        <div class="col-xs-6 left-option">Phone</div>
        <div class="col-xs-6 right-option done">Connected</div>
        <div class="col-xs-6 left-option">Airplane mode</div>
        <div id="airplaneStatus" class="col-xs-6 right-option">Waiting..</div>
    </div>

    <div id="countdownExample">
        <div class="values"></div>
    </div>
</div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <script src="/js/easytimer.js"></script>
@endsection
