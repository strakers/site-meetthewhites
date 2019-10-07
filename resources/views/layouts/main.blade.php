<!doctype>
<html lang="{{ config('app.locale') }}" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">

    @yield('styles')

    <style type="text/css">
        body {
            font-family: CaviarDreams, sans-serif;
            text-align: center;
        }
        .container.banner {
            overflow: hidden;
        }

        .parallax{
            background-attachment: fixed;
            background-position: center center;
            background-size: cover;
            width: 100%;
            padding: 0;
            min-height: 400px;
        }

        .bordered-wrapper {
            padding: 1em 0;
            border-bottom: 1px dashed darkgoldenrod;
            border-top: 1px dashed darkgoldenrod;
        }

        .bordered-wrapper.first {
            padding-top: 0;
            border-top: 0 none;
        }

        .bordered-wrapper.last {
            padding-bottom: 0;
            border-bottom: 0 none;
        }

        .banner {
            width: 100%;
            height: 100%;
            position:relative;
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            padding: 0;
            content: attr(data-image)
        }

        .banner .title {
            color: #fff;
            text-transform: uppercase;
            text-align:center;
            width: 100%;
            position: absolute;
            top:50%;
            font-family: ChasingEmbers, serif;
            font-size:800%;
            line-height: 50%;
            *text-shadow: 0 0 4px #ccae00;
            text-shadow: 0 0 4px #fff, 0 0 32px #000;
        }

        .banner .title .raise {
            margin-bottom: .25em;
        }

        .heading {
            font-family: ChasingEmbers, serif;
            font-size: 300%;
        }

        .heading .switch {
            font-family: CaviarDreams, sans-serif;
            font-size: 40%;
            font-weight: normal;
        }

        .basket {
            font-size: 150%;
            line-height: 110%;
        }

        .bordered {
            padding: 2em;
            border: 1px solid rgba(0, 0, 0, 0.46);
        }

        .navbar-blanc {
            background-color: #fff;
            border-color: #fff;
            margin-bottom: 0;
            font-size:120%;
        }
        .navbar-toggle {
            border-radius: 0;
            border: 0;
        }
        .navbar-default .navbar-nav>li>a:focus, .navbar-default .navbar-nav>li>a:hover {
            *color: #fff;
            background-color: rgba(184, 134, 11, 0.28);
        }

        .content.title.box {
            top: 45%;
        }
        .title-box {
            padding: .5em;
            border: 1px solid rgba(255, 255, 255, 0.4);
            margin: 0 auto;
            display: inline-block;
        }
        .sub-title {
            font-family: CaviarDreams, sans-serif;
            font-size: 20%;
            line-height: 100%;
            padding: 0 .5em;
        }
        .pull-down {
            margin-top: 3em;
        }
        .push-down {
            margin-bottom: 3em;
        }
        .allcaps {
            text-transform: uppercase;
        }
        .gold {
            font-weight: 700;
            color: darkgoldenrod;
        }
        .gold-soft {
            color: darkgoldenrod;
        }

        h3 {
            text-transform: uppercase;
        }

        .embed {
            position: relative;
            padding-bottom: 56%; /* This is the aspect ratio */
            height: 0;
            overflow: hidden;
        }
        .embed iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100% !important;
            height: 100% !important;
        }

        .btn-themed {
            border: 2px solid #000;
            background: #fff;
            color: #000;
            padding: 1em 2em;
            transition: background .5s;
            -webkit-transition: background .5s;
        }
        .btn-themed:hover,
        .btn-themed:focus {
            *color: #000;
            background: darkgoldenrod;
            border: 2px solid rgba(184, 134, 11, 0.28);
        }
        label { font-weight: normal; }
        label.guest-name { font-weight: 700; text-transform: uppercase; }

        .map-link { display: block; text-align: center; }
        .map-link a { transition: padding .5s; -webkit-transition: padding .5s; text-decoration: none; }
        .map-link:before { content: '-'; margin-right: 4px; }
        .map-link:after { content: '-'; margin-left: 4px; }
        .map-link a:hover { padding: 0 1em; }

        .side-form {
            padding-top: 5em;
            padding-bottom: 5em;
            background-color: #fff;
            opacity:0.75;
            height:100%;
            box-shadow:0 0 4px #fff,0 0 8px #fff;
            color: #000;
        }

        a { color: #b8860b; }
        a:hover { color: #9e6d0b; }

        a.page-nav {
            outline: none;
            position: relative;
            display: inline-block;
        }

        a.page-top:after{
            position: absolute;
            top: 100%;
            left: 25%;
            text-transform: uppercase;
            font-size: small;
            content: "Top";
        }

        a.page-next .fa-circle { color: rgba(79, 156, 81, 0.77); }
        a.page-next:focus .fa-circle,
        a.page-next:hover .fa-circle { color: rgba(60, 118, 61, 0.91); }
        a.page-prev .fa-circle { color: #9c9a7e; }
        a.page-prev:focus .fa-circle,
        a.page-prev:hover .fa-circle { color: #89746a; }
        a.page-prev:after{
            position: absolute;
            top: 25%;
            right: 110%;
            text-transform: uppercase;
            font-size: small;
            content: "Prev";
        }

        a.page-next .fa-circle { color: #9c9a7e;  }
        a.page-next:focus .fa-circle,
        a.page-next:hover .fa-circle { color: #89746a; }
        a.page-next:after{
            position: absolute;
            top: 25%;
            left: 110%;
            text-transform: uppercase;
            font-size: small;
            content: "Next";
        }

        .parallax-window {
            min-height: 400px;
            background: transparent;
        }

        hr {
            border-style: dashed;
            border-color: darkgoldenrod;
        }

        .carousel {
            transition: height .5s;
            -webkit-transition: height .5s;
            overflow: hidden;
            counter-reset: slide;
            position: relative;
        }

        .carousel img {
            max-width: 100%;
        }

        .carousel img::after {
            counter-increment: slide;                /* Increment the section counter*/
            content: counter(slide);
        }

        .form-group label {
            margin: 1em 0;
            padding-left: 2em;
            text-align: left;
        }

        .form-control {
            border: none 0;
            border-bottom: 1px solid #eee;
            box-shadow: none;
            -webkit-box-shadow: none;
            border-radius: 0;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            margin: 1em 0;
            text-align: center;
            text-align-last:center;
            color: darkgoldenrod;
        }

        .form-control.outline {
            border: 1px solid #000;
            border-radius: 2px;
        }

        .control-label.required:after {
            content: ' *';
            color: #c00;
            font-weight: 400;
        }

        .checkbox {
            margin: 1em 0;
        }

        .checkbox .btn-group-justified {
            outline: none;
        }

        .guest-rsvp-fieldset .btn-danger {
            background-color: rgba(193, 46, 42, 0.71);
            border-color: rgba(185, 44, 40, 0.71);
        }

        .guest-rsvp-fieldset .btn-danger:hover {
            background-color: rgba(172, 41, 37, 0.71);
            border-color: rgba(118, 28, 25, 0.7);
        }

        .crew-title {
            text-transform: uppercase;
            letter-spacing: 7px;
            transition: letter-spacing .3s;
        }

        .top-bordered {
            border-top: 1px dashed #eee;
            padding-top: 1em;
        }

        .bottom-bordered {
            border-bottom: 1px dashed #eee;
        }


        /*.variable-width .slick-slide p { background: #fff; height: 100px; color:#3498db; margin: 5px; line-height: 100px; }*/
        .slick-slide {outline: none;}
        .slick-slide .image{padding:0px;outline: none;}
        .slick-slide img{border:5px solid #FFF;display:block;width:100%;outline: none;}
        .slick-slide img.slick-loading{border:0 }
        .slick-slider{margin:30px auto 50px;}
        .slick-dots{width:97%!important;}
        .slick-prev {
            left: 35px !important;
            z-index: 2;
        }
        .slick-next {
            right: 35px !important;
            z-index: 2;
        }
        .slick-next:before, .slick-prev:before {
            color: #fff !important;
            text-shadow: 0 0 4px #fff, 0 0 32px #000;
        }

        @media (max-width: 1200px) {
            .hr-fit { width: 96%; }
        }
        @media (max-width: 768px) {
            .hr-fit { width: 93%; }
        }
        @media (max-width: 460px) {
            .hr-fit { width: 90%; }
            .crew-title {
                letter-spacing: 1px;
            }
            .crew_member {
                margin-top: 6px;
            }
        }
        @media (max-width: 460px) {
            .hr-fit { width: 88%; }
        }
    </style>

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-49302055-6', 'auto');
    ga('send', 'pageview');

</script>
<div id="app">
    <nav class="navbar navbar-default navbar-blanc navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/guest') }}">
                    Meet The Whites
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <?php
                        $pages = config('navi.guest');
                        $curr = get_page_slug();
                    ?>
                    @foreach ($pages as $page)
                        <li{{ $page['name'] == $curr ? ' class="active"' : '' }}><a href="{{ url('/guest' . $page['link']) }}">{{ $page['label'] }}</a></li>
                    @endforeach
                    {{--<li><a href="{{ url('/guest/logout') }}">Logout</a></li>--}}
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    {{--<hr class=" pull-down push-down" />--}}

    <div class="container pull-down push-down">
        <div class="content basket">
            <div>
                <?php if($prev = get_prev_page_link()): ?>
                <a href="{{ url('/guest' . $prev) }}" id="prev_page" title="Prev Page" class="page-nav page-prev" rel="prev">
                    <span class="fa-stack fa-lg">
                        <i class="fa fa-circle fa-stack-2x"></i>
                        <i class="fa fa-chevron-left fa-stack-2x fa-inverse"></i>
                    </span>
                </a>
                <?php endif; ?>
                <a href="#top" id="back_to_top" title="Back to Top" class="page-nav page-top" rel="start">
                    <span class="fa-stack fa-lg">
                        <i class="fa fa-circle fa-stack-2x"></i>
                        <i class="fa fa-chevron-up fa-stack-2x fa-inverse"></i>
                    </span>
                </a>
                <?php if($next = get_next_page_link()): ?>
                <a href="{{ url('/guest' . $next) }}" id="next_page" title="Next Page" class="page-nav page-next" rel="next">
                    <span class="fa-stack fa-lg">
                        <i class="fa fa-circle fa-stack-2x"></i>
                        <i class="fa fa-chevron-right fa-stack-2x fa-inverse"></i>
                    </span>
                </a>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <footer class="container">
        <p>&copy; Copyright 2017 meetthewhites.ca</p>
    </footer>
</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script>
    (function(query){
        var pages = [], number;
        <?php //echo "pages = JSON.parse('" . json_encode( get_page_map() ) . "');"; ?>
                number = query.replace('?p=','');
        if(pages[number]){
            window.location.hash = pages[number];
        }
    })(window.location.search);
    (function($){
        $('.banner').each(function(i,o){
            var $me = $(o),
                    bg = $me.attr('data-image'),
                    pos = $me.attr('data-pos'),
                    scale = $me.attr('data-scale'),
                    top = $me.attr('data-top')
                    ;
            $me.css('background-image', 'url(' + bg + ')' );
            if( pos ) $me.css('background-position', pos );
            if( scale ) true; /* do something later */
            if( top ) $me.find('.title').css('top', top);
        });
        $('#back_to_top').on('click',function(e){
            e.preventDefault();
            $('body,html').animate({'scrollTop':0},500);
            return false;
        })
    })(jQuery);
</script>
@yield('scripts')

</body>
</html>

<?php

/**
 * @return array
 */
function get_whitelist(){
    $pages = config('navi.guest');
    return array_pluck($pages,'name');
}

function get_page_slug(){
    $url = url()->current();
    $parts = explode('/', $url);
    $end = end(($parts));
    return $end;
}

function get_next_page_link(){
    $curr = get_page_slug();
    $pages = config('navi.guest');
    $match = false;
    for($i = 0; $i < count($pages); ++$i){
        if($match){
            return $pages[$i]['link'];
        }
        if( $pages[$i]['name'] === $curr ){
            $match = true;
        }
    }
    return '';
}

function get_prev_page_link(){
    $curr = get_page_slug();
    $pages = config('navi.guest');
    $match = false;
    for($i = count($pages) - 1; $i >= 0; --$i){
        if($match){
            return $pages[$i]['link'];
        }
        if( $pages[$i]['name'] === $curr ){
            $match = true;
        }
    }
    return '';
}

?>