<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

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
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }

        .text-center {
            text-align: center;
        }

        .form-control {
            padding: .75em .75em;
            border-radius: 3px;
            border: 1px solid #d7d7d7;
            margin-bottom: 1.5em;
        }

        .btn.btn-primary {
            border: 1px solid #d7d7d7;
            background-color: transparent;
            color: #636b6f;
            border-radius: 3px;
            padding: .75em 2.25em;
            margin-bottom: 1.5em;
            cursor: pointer;
            -webkit-transition: background .5s;
            transition: background .5s;
        }

        .btn.btn-primary:hover {
            background-color: #e7e7e7;
            border-color: #636b6f;
            *color: #fff;
            border-radius: 3px;
        }

        .text-danger{
            color: #a30a2a;
            font-size: 85%;
        }

    </style>
</head>
<body>
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @if (Auth::check())
                <a href="{{ url('/admin') }}">Home</a>
            @else
                <a href="{{ url('/guest') }}">Guest</a>
                <a href="{{ url('/login') }}">Admin</a>
            @endif
        </div>
    @endif

    <div class="content">
        <div class="title m-b-md">
            {{ config('app.name', 'Laravel') }}
        </div>

        <div class="extra m-b-md">
            <form role="form" method="post" action="{{ route('guest.login') }}">
                {{ csrf_field() }}

                <div class="form-group">
                    <div class="col-md-6">
                        <input id="code" type="text" class="form-control text-center" name="code" placeholder="Enter Pass Code" maxlength="10" required autofocus>

                        <div>
                            @if ($errors->has('code'))
                                <span class="help-block text-danger">
                                        <strong>{{ $errors->first('code') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <input type="submit" class="btn btn-primary" value="Enter Guest Site">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
