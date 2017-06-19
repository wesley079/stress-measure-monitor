@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <i class="fa fa-check session-big-icon" aria-hidden="true"></i>

    <h1 class="session-big-title">Session done, now disable airplane mode on your smartphone to end</h1>

    </div>
    <label id="session-code" class="col-xs-6 right-option hidden">{{session()->get('code')}}</label>

</div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <script src="/js/easytimer.js"></script>
@endsection
