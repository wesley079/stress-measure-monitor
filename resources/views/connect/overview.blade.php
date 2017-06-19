@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Your personal statistics</h1>
        <div class="container-fluid">
            <div class="col-md-4">
                <h2>Your connections</h2>
                <ul>
                    <?php
                    foreach ($connections as $p) {
                    ?>
                    <?= $p[0] ?> - <a href="/statistics/connection/<?= $p[1]?>">Watch statistics</a>
                    <?php
                    }
                    ?>
                </ul>
                <ul>
                    <?php
                    foreach ($pending as $p) {
                        ?>
                          <?= $p ?> - Pending
                        <?php
                    }
                    ?>
                </ul>

            </div>
            <div class="col-md-7 col-md-offset-1">
                <h2>Request / add a friend</h2>
                <span class="title-span col-xs-12">Pending requests</span>
                <ul>
                    <?php
                    foreach ($request as $p) {
                    ?>
                    <?= $p[0] ?> - <a href="/allowAuthorization/<?=$p[1]?>">Allow</a> / <a href="disallowAuthorization/<?=$p[1]?>">Disallow</a>
                    <?php
                    }
                    ?>
                </ul>
                <span class="title-span col-xs-12">Add contact</span>
                <p class="col-xs-12">Adding a connection needs approvement. You can follow your connections status in your connections list.</p>
                <form class="col-xs-12" method="post" action="/addConnection">
                    <div class="col-xs-6">
                        <input class="input-request" type="text" name="name" placeholder="name"/>
                        <input class="input-request" type="email" name="email" placeholder="email"/>
                    </div>
                    <div class="col-xs-6">
                        <input class="submit-form-button" type="submit" value="Send request"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
