@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Hey, what do you want to do?</h1>


    <div class="row">
        <a href="/new_session"><div class="col-xs-12 col-md-4">New Session</div></a>
        <div class="col-xs-12 col-md-4">My statistics</div>
        <div class="col-xs-12 col-md-4">Connected accounts</div>
    </div>
</div>
@endsection
