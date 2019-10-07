@extends('layouts.main')

@section('styles')
    <link rel="stylesheet" type="text/css" id="slick_slider_css" href="//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.css" />
    <link rel="stylesheet" type="text/css" id="slick_slider_theme" href="//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick-theme.min.css" />
    <style class="text/css">
        .thumb-block {
            position: relative;
            transform: rotateY(0deg);
            transition: transform .5s;
            overflow: hidden;
            margin-bottom: 1em;
        }
        .thumb-block a {
            outline: none;
        }
        .thumb-block .expander {
            top: 39%;
            left: 0;
            right: 0;
            bottom: 0;
            position: absolute;
            text-align: center;
            color: #fff;
            display: none;
            text-shadow: 0 0 24px #222;
        }

        .thumb-block:hover .expander,
        .thumb-block:focus .expander {
            display: block;
        }

        #feed_more.thumb-block .expander {
            display: block;
        }

        #feed_more.thumb-block img {
            background-color: #333;
        }

        .thumb-block:hover img,
        .thumb-block:focus img {
            opacity: .6;
            background-color: #222;
            box-shadow: 0 0 4px #aaa;
        }
        .modal-text-column {
            margin-top: 2em;
            margin-right: 2em;
            margin-bottom: 2em;
        }

        #modal_video {
            min-height: 765px;
            background-color: #000;
        }

        .close-modal {
            position: absolute;
            bottom: 1em;
            right: 1em;
            cursor: pointer;
        }


        @media screen and (max-width:767px) {
            .modal-text-column {
                margin-left: 2em;
            }

            #modal_video {
                min-height: 565px;
            }

            .thumb-block .expander {
                top: 44%;
            }
        }
    </style>
@endsection

@section('scripts')
    <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script>
        function preloadImages(i,o){
            var $me = $(o), imgsrc = $me.attr('data-src');
            $me.attr('src', imgsrc).removeAttr('data-src');
        }

        $('.close-modal').on('click',function(){
            $('.bs-example-modal-lg').modal('hide');
        });

        $feed = $('#instagram_feed');
        $modal_img = $('#modal_img');
        $modal_video = $('#modal_video');
        $modal_caption = $('#modal_caption');
        $feed_more = $('#feed_more');

        $feed.last_call = {};
        $feed.is_loading = false;
        $feed_more.activateLoading = function(){
            $feed.is_loading = true;
            $feed_more.find('.call-to-action').addClass('hidden');
            $feed_more.find('.fa-spin').removeClass('hidden');
            $feed_more.addClass('is_loading');
        };
        $feed_more.disableLoading = function(){
            $feed.is_loading = false;
            $feed_more.find('.call-to-action').removeClass('hidden');
            $feed_more.find('.fa-spin').addClass('hidden');
            $feed_more.removeClass('is_loading');
        };

        $feed.on('click','.thumb-block a',function(e){
            var $this = $(this),
                    o = {
                        'id' : $this.parent().attr('id'),
                        'src' : $this.attr('data-src'),
                        'caption' : $this.find('p.caption').html(),
                        'code' : $this.attr('data-code'),
                        'height' : $this.attr('data-height'),
                        'is_video' : $this.attr('data-video') * 1
                    };

            $modal_img.attr('src',o.src);
            $modal_video.removeClass('hidden');
            if( o.is_video ) {
                $modal_video.attr('src','https://www.instagram.com/p/' + o.code + '/embed/');
                $modal_video.show();
                $modal_img.hide();
            } else {
                $modal_video.hide();
                $modal_video.attr('src','');
                $modal_img.show();
            }
            $modal_caption.html(o.caption);
        });

        $modal_video.on('load',function(){
            //console.log('loaded');
        });

        $('.bs-example-modal-lg').on('hidden.bs.modal', function (e) {
            $modal_video.attr('src','');
        });

        $feed_more.not('.is_loading').find('a').on('click', function(e){
            e.preventDefault();
            getMorePosts();
            return false;
        });

        $feed_more.hide();

        function getInitPosts(){

            // prepare url for querying
            var url = './media/init';

            // set loader
            $feed_more.activateLoading();

            // prevents eternal spinner
            var timer = setTimeout(function(){
                if($feed.is_loading = true) {
                    console.log('cancelled');
                    $feed_more.disableLoading();
                }
            },12000);

            // perform ajax call for posts
            $.get(url, function (response) {
                console.log('more', response);
                var new_posts = '';

                if (response.data) {
                    if(response.data.length) {
                        for (var i = 0, o; i < response.data.length; ++i) {
                            o = response.data[i];
                            new_posts += postTemplate( o );
                        }
                    }
                    else {
                        console.log('all done!!');
                        $feed_more.find('.call-to-action,.fa-spin').hide();
                        $feed_more.fadeOut(350);
                    }
                }

                // append data
                //$feed_more.before(new_posts);
                var xi = 0;
                $(new_posts).insertBefore( $feed_more ).fadeIn(function(){
                    console.log('loaded post',xi);
                    return 300 * (xi++);
                });

                // change settings
                console.log('completed loading',response);
                $feed_more.disableLoading();

                clearTimeout(timer);

            }, 'json');

            $feed_more.removeClass('hidden').fadeIn();
        }

        function getMorePosts() {

            console.log('pre call',$feed.last_call);

            // prepare url for querying
            var url = './media/more';
            if( $feed.last_call.id && $feed.last_call.end_cursor ) {
                url += '?id=' + $feed.last_call.id + '&cursor=' + $feed.last_call.end_cursor;
            }

            console.log('call',url);

            // set loader
            if( $feed.is_loading ){
                console.log('already loading');
                return;
            } else {
                $feed_more.activateLoading();
            }

            // prevents eternal spinner
            var timer = setTimeout(function(){
                if($feed.is_loading = true) {
                    console.log('cancelled');
                    $feed_more.disableLoading();
                }
            },12000);

            console.log('start');

            // perform ajax call for posts
            $.get(url, function (response) {
                console.log('more', response);
                var new_posts = '';

                if (response.data) {
                    if(response.data.length) {
                        for (var i = 0, o; i < response.data.length; ++i) {
                            o = response.data[i];
                            new_posts += postTemplate( o );
                        }
                    }
                    else {
                        console.log('all done!!');
                        $feed_more.find('.call-to-action,.fa-spin').hide();
                        $feed_more.fadeOut(350);
                    }
                }

                // gather data from last call (for next call)
                $feed.last_call.id = response.id;
                $feed.last_call.end_cursor = response.end_cursor;

                // append data
                //$feed_more.before(new_posts);
                var xi = 0;
                $(new_posts).insertBefore( $feed_more ).fadeIn(function(){
                    console.log('loaded post',xi);
                    return 300 * (xi++);
                });

                // change settings
                console.log('completed loading',$feed.last_call,response);
                $feed_more.disableLoading();

                clearTimeout(timer);

            }, 'json');
        };

        function postTemplate( o ){
            return '<div id="' + o.id + '" class="col-md-3 col-sm-6 col-xs-12 thumb-block" style="display: none;">' +
                '<a href="#img_' + o.code + '" data-toggle="modal" data-target=".bs-example-modal-lg" data-src="' + o.fullsize + '" data-code="' + o.code + '" data-height="' + o.height + '" data-video="' + (o.is_video * 1) + '" data-time="' + (o.timestamp || 0) + '">' +
                '<img src="' + o.thumbnail + '" class="image img img-responsive img-circle" />' +
                '<div class="expander">' +
                ( o.is_video ? '<i class="fa fa-volume-up fa-fw fa-3x"></i>' : '<i class="fa fa-eye fa-fw fa-3x"></i>' ) +
                '</div>' +
                '<p class="hidden caption">' + o.caption + '</p>' +
                '<img class="hidden preload" src="' + o.fullsize + '" />' +
                '</a>' +
                '</div>'
        }

        getInitPosts();

    </script>
@endsection

@section('content')

    <div class="container pull-down">
        <div class="content basket row" role="main" id="instagram_feed">
            @if($instagram)
                @foreach($instagram as $item)
                    <div id="{{ $item['id'] }}" class="col-md-3 col-sm-6 col-xs-12 thumb-block">
                        <a href="#img_{{ $item['code'] }}" data-toggle="modal" data-target=".bs-example-modal-lg" data-src="{{ $item['fullsize'] }}" data-code="{{ $item['code'] }}" data-height="{{ $item['height'] }}" data-video="{{ (int) $item['is_video'] }}">
                            <img src="{{ $item['thumbnail'] }}" class="image img img-responsive img-circle" />
                            <div class="expander">
                                @if( $item['is_video'] )
                                    <i class="fa fa-volume-up fa-fw fa-3x"></i>
                                @else
                                    <i class="fa fa-eye fa-fw fa-3x"></i>
                                @endif
                            </div>
                            <p class="hidden caption">{{ $item['caption'] }}</p>
                            <img class="hidden preload" src="{{ $item['fullsize'] }}" />
                        </a>
                    </div>
                @endforeach
            @endif

            <div id="feed_more" class="col-md-3 col-sm-6 col-xs-12 thumb-block hidden">
                <a href="#feed_more_now">
                    <img src="./../images/gray.png" class="image img img-responsive img-circle" />
                    <div class="expander">
                        <span class="call-to-action">load<br />more</span>
                        <i class="fa fa-refresh fa-fw fa-3x fa-spin hidden"></i>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="row">
                    <div class="col-md-8 col-xs-12">
                        <img src="" class="img-responsive" id="modal_img" />
                        <iframe src="" id="modal_video" type="video/mp4" class="img-responsive" style="width:100%" scrolling="no" frameborder="0"></iframe>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="modal-text-column">
                            <p id="modal_caption" class="">Lorem ipsum dolor</p>
                        </div>
                    </div>
                    <div class="close-modal">
                        <i class="fa fa-remove fa-fw fa-lg"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection