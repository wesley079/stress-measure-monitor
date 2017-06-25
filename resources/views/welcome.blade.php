<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                background: url('/img/pexels-photo-299863.jpeg') 100% no-repeat;
                background-position: center;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
                color: white;
            }

            .links > a {
                color: whitesmoke;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
            h2{
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                color: white;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            button{
                background: white;
                color: black;
                border-radius: 20px;
                padding: 10px 20px;;
                border: none;
                font-size: 1.3em;
                cursor: pointer;
            }
            button:hover{
                background-color: rgba(256,256,256, 0.8);
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Stress Measure Monitor
                </div>
                <h2>Smartphones, the #1 stress causer</h2>
                @if (Auth::check())
                    <a href="{{ url('/home') }}"><button>Open dashboard</button></a>
                @else
                    <a href="{{ url('/register') }}"><button>Register now</button></a>
                @endif
            </div>
        </div>
    </body>
</html>
