<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Meet The Whites</title>
    <link rel="manifest" href="manifest.json">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
    <style>
        @font-face {
            font-family: ChasingEmbers;
            src: url("fonts/ChasingEmbers.otf") format("opentype");
        }

        @font-face {
            font-family: CaviarDreams;
            src: url("fonts/CaviarDreams.ttf") format("truetype");
        }

        @font-face {
            font-family: CaviarDreams;
            font-weight: bold;
            src: url("fonts/CaviarDreams_Bold.ttf") format("truetype");
        }

        @font-face {
            font-family: CaviarDreams;
            font-style: italic;
            src: url("fonts/CaviarDreams_Italic.ttf") format("truetype");
        }

        @font-face {
            font-family: CaviarDreams;
            font-weight: bold;
            font-style: italic;
            src: url("fonts/CaviarDreams_BoldItalic.ttf") format("truetype");
        }

        body {
            *padding-top: 79px;
            padding-top: 2em;
            padding-top: .5em;
            padding-bottom: 20px;
            transition: padding .5s;
            -webkit-transition: padding .5s;
            background: #0f1920;
        }

        .jumbotron {
            margin-bottom: 0;
            background-attachment: scroll;
            *background-clip: border-box;
            background-origin: border-box;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            color: #fff;
            background-color: #fff;
            text-shadow: 0 0 16px #000;
            background-position: center !important;
            background-attachment: scroll !important;
        }

        .jumbotron.static {
            background-attachment: scroll;
        }

        .jumbotron.gallery {
            padding: 0;
        }

        .video img {
            cursor: pointer;
            opacity: .5;
        }

        .video img:hover {
            opacity: 1;
        }

        section.container,
        footer.container {
            padding-top: 30px;
            padding-bottom: 10px;
        }

        section.container {
            padding-bottom: 100px;
        }

        .flex-center {
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .flex-center h1 {
            margin: 0;
            padding: 0;
        }

        .flex-bottom {
            display: block;
            position: relative;
            align-items: flex-end;
            justify-content: center;
        }
        .flex-bottom h1 {
            position: absolute;
            display: block;
            width:100%;
            text-align: center;
            bottom: -3%;
            margin: 0;
            padding: 0;
            margin-left: -.25em;
        }

        .nav-bleached {
            background-color: #0f1920;
            padding: 1em 0;
            margin-bottom: 0;
        }

        .nav.navbar-nav.navbar-right {
            margin: 0;
        }

        img.dummy {
            *height: 100px;
        }

        .text-lg {
            font-size:200%;
        }

        .quote {
            display: block;
            font-size: 220%;
            *color: #20895e;
            color: #e40000;
        }
        .quote::before {
            content: '"';
            opacity: .5;
        }
        .quote::after {
            content: '"';
            opacity: .5;
        }

        .container h2 {
            border-bottom: 1px solid #eee;
            padding-bottom: .5em;
        }

        body .gf-title { font-family: ChasingEmbers, serif; font-size:800%; color: #fff; transition: font-size .5s; -webkit-transition: font-size .5s; }
        body .gf-body { font-family: CaviarDreams, sans-serif; *color: #b39c1f;  color: #fff;  }
        .jumbotron {
            *border-top: 1px solid #caae19;
            *border-bottom: 1px solid #caae19;
            margin: 0.5em;
            border-radius: 4px;
        }

        .navbar-splash {
            padding: 0;
            min-height:.5em !important;
            border: none;
        }

        .footer hr {
            border-color: #23221f;
        }

        .form-control {
            display: inline;
            width: auto;
        }

        @media (max-width: 992px) {

            body {
                padding-top: 2em;
            }

            .navbar-splash .container {
                padding: .5em;
            }

        }

        @media (max-width: 800px) {

            body .gf-title {
                font-size: 500%;
            }

        }

        @media (max-width: 533px) {

            body .gf-title {
                font-size: 350%;
                text-shadow: #000 4px 0 4px;
            }

            .jumbotron {
                background-position: center !important;
                background-attachment: scroll !important;
            }

            .flex-banner.flex-bottom h1 {
                bottom: -10%;
            }

        }

        @media (max-width: 269px) {

            body .gf-title {
                font-size: 250%;
            }
        }

    </style>
</head>
<body class="title-arefx body-ralex fancy-tang">
<?php //include_once("../../analyticstracking.php") ?>

<nav class="navbar navbar-default navbar-fixed-top nav-bleached gf-body navbar-splash visible-sm visible-xs" role="navigation" id="topnav">
    <div class="container">
        <div class="text-center">
            <span class="" >Meet The Whites</span>
        </div>
    </div>
</nav>

<div class="page" id="firstpage">

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <!-- banner title -->
    <div class="jumbotron" data-image="{{ asset('images/splash_banner2.jpg') }}" data-y-origin="150" data-imagex="http://lorempixel.com/1600/795/">
        <div class="container flex-bottom flex-banner" id="flexbanner">
            <div class="text-center">
                <h1 class="gf-title">Meet The Whites &nbsp;&nbsp;</h1>
            </div>
        </div>
    </div> <!-- /.jumbotron -->

    <footer class="container footer">
        <!--div class="row">
            <div class="col-md-12 text-center">
                <div class="gf-body text-lg">
                    <p>Save the Date</p>
                </div>
            </div>
            <div class="col-md-12 text-center">
                <div class="gf-body">
                    <p>August 26, 2017</p>
                </div>
            </div>
        </div>
        <hr /-->
        <!--<div class="row">
            <div class="col-md-12 text-center">
                <div class="gf-body text-lg ">
                    <!--                    <div id="countdown">02w 10d 07m 12s</div>-- >
                    <div id="countdown">
                        <div class="timer"><span data-type="week%!w" class="time weeks t%w%d%H%M%S">%w</span>w <span data-type="day%!D" class="time days t%D%H%M%S">%d</span>d <span data-type="hour%!H" class="time hours t%H%M%S">%H</span>h <span data-type="minute%!M" class="time minutes t%M%S">%M</span>m <span data-type="second%!S" class="time seconds t%S">%S</span>s</div>
                    </div>
                </div>
            </div>
        </div>
        <hr />-->
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="gf-body">
                    <p><small>Please enter password located on your RSVP card.</small></p>
                    <p></p>
                </div>
            </div>

            <div class="ecol-md-12 text-center">
                <form role="form" method="post" action="{{ route('guest.login') }}">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <div class="col-md-6x text-center">
                            <input id="code" type="text" class="form-control text-center" name="code" maxlength="6" required autofocus>
                            <input type="submit" class="btn btn-default" value="Enter">

                            @if ($errors->has('code'))
                            <div>
                                <span class="help-block text-danger">
                                    <strong>{{ $errors->first('code') }}</strong>
                                </span>
                            </div>
                            @endif

                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="gf-body">
                    <p></p>
                    <p>&copy; Copyright 2017 MeetTheWhites.ca</p>
                </div>
            </div>
        </div>
    </footer> <!-- /container -->

</div> <!-- /page -->

<script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="//cdn.rawgit.com/hilios/jQuery.countdown/2.0.4/dist/jquery.countdown.min.js"></script>
<script src="{{ asset('js/countdown.js') }}"></script>
<script>
    if(/*!$("html").hasClass("touch") &&*/ true){
        /* background fix */
        $(".jumbotron").not('.static').css("background-attachment", "fixed");
    }

    (function($){

        /*BuildCountDown('#countdown', '2017/08/26 15:15:00', {
            template: '<div class="timer"><span data-type="week%!w" class="time weeks t%w%d%H%M%S">%w</span>w <span data-type="day%!D" class="time days t%D%H%M%S">%d</span>d <span data-type="hour%!H" class="time hours t%H%M%S">%H</span>h <span data-type="minute%!M" class="time minutes t%M%S">%M</span>m <span data-type="second%!S" class="time seconds t%S">%S</span>s</div>'
        });*/


        $('#xclasses').html( $('html').attr('class') + " -- " + $(window).width() );

        var $flexbanner = $('.flex-banner');
        $(window).on('resize',function(){
            var width = $(window).width();
            $flexbanner.add('.gallery').css('height', (width * .5) + 'px');
        }).resize();

        var $jumbo = $('.jumbotron');
        $jumbo.css('background-image',function(){
            return 'url(' + $(this).attr('data-image') + ')';
        });

        var scrollSpeed = -.15, $window = $(window);
        $window.on('scroll',function(){

            if($window.width() > 400 ) { // limit for small devices
                $jumbo.not('.static').each(function (i, o) {
                    var masterOffset = window.pageYOffset,
                            masterHeight = $window.height(),
                            elOffset = $(o).offset().top,
                            elPosX = $(o).attr('data-x') || '50%',
                            elPosY = o.getBoundingClientRect().top,
                            elPosYOrigin = $(o).attr('data-y-origin') || 0,
                            elHeight = $(o).height(),
                            elBgPos = elPosX + " " + (((masterOffset - elOffset) * scrollSpeed) - elPosYOrigin) + "px";

                    if (i == 1)
                        console.log('make', i, elPosYOrigin, masterHeight, elPosY, Math.round(elPosY + elHeight - masterHeight), masterOffset);

                    $(o).css('background-position', elBgPos);

                    if (elPosY + elHeight > masterHeight) {
                        $(o).css('opacity', (Math.round(( masterOffset - elPosY + elHeight ) * 100 / elHeight) / 100) + 0);
                    } else if (masterOffset > elOffset) {
                        $(o).css('opacity', (Math.round((elOffset - masterOffset + (elHeight / 2)) * 100 / elHeight) / 100) + .5);
                    } else {
                        $(o).css('opacity', 1);
                    }
                });
            }
        });
    })(jQuery);
</script>
</body>
</html>