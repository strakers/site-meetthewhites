@extends('guest.event-template')

@php
$slides = [
    'main' => ['/002_AD5I6760mk-min.jpg', '/003_AD5I6761mk-min.jpg', '/005_AD5I6763mk-min.jpg', '/006_AD5I6765mk-min.jpg', '/007_AD5I6765mk2-copy-min.jpg', '/013_AD5I6775mk-min.jpg', '/031_AD5I6823mk-min.jpg', '/034_AD5I6843mk-min.jpg', '/036_AD5I6846mk-min.jpg', '/037_AD5I6850mk-min.jpg', '/038_AD5I6852mk-min.jpg', '/039_AD5I6854mk-min.jpg', '/040_AD5I6856mk-min.jpg', '/041_AD5I6856mk_edited-2-min.jpg', '/042_AD5I6866mk-min.jpg', '/043_AD5I6867mk-min.jpg', '/044_AD5I6869mk1-min.jpg', '/056_AD5I6904mk-min.jpg', '/059_AD5I6918MK-min.jpg', '/062_AD5I6959MK_edited-1-min.jpg', '/063_AD5I6967mk-min.jpg', '/064_AD5I6971MK-min.jpg', '/067_AD5I6987mk-min.jpg', '/068_AD5I6987mk_edited-1-min.jpg', '/071_AD5I7011mk-min.jpg', '/077_AD5I8041mk1-min.jpg', '/079_AD5I8057mk1-min.jpg', '/082_AD5I8075m2-min.jpg', '/084_AD5I8080mk2-min.jpg', '/087_AD5I8098mk-min.jpg', '/095_AD5I8119mk_2-min.jpg', '/096_AD5I8123mk-min.jpg', '/097_AD5I8126mk-min.jpg', '/098_AD5I8136mk1-min.jpg', '/110_AD5I8185mk-min.jpg'],
    'risquee' => ['/030_AD5I6819mk-min.jpg', '/033_AD5I6839mk31-min.jpg', '/060_AD5I6950mk-min.jpg', '/061_AD5I6954MK-min.jpg', '/113_AD5I8192mk-min.jpg', '/115_AD5I8195mk1-min.jpg'],
    'bloopers' => ['/001_AD5I6755mk-min.jpg', '/069_AD5I7001mk2-min.jpg', '/070_AD5I7009mk-min.jpg', '/103_AD5I8171mk2-min.jpg', '/105_AD5I8174mk3-min.jpg', '/106_AD5I8175mk2-min.jpg', '/107_AD5I8176mk-min.jpg', '/076_AD5I8034mk-min.jpg'],
];
$page_extra = \App\Page::where('slug', 'recap')->first();
@endphp



@section('page-title')
    Wedding Recap
@endsection

@section('sub-title')
    2017 . 08 . 26
@endsection

@section('event')
    <!-- recap video -->
    <div class="bordered-wrapper first">
        <div class="wide-container video">
            <div class="embed">
                <iframe src="https://player.vimeo.com/video/446983538?title=0&portrait=0&byline=0" width="640"
                    height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
            </div>
        </div>
    </div>

    <div class="bordered-wrapper first">
        <div class="container pull-down push-down">
            <div class="content basket bordered">
                {!! $page_extra ? $page_extra->content('recap_dialog')->content : '' !!}
                <div></div>
            </div>
        </div>
        <br class="clearfix" />
    </div>

    <!-- first gallery: main -->
    <div class="container slider carousel main-gallery pull-down push-down">
        <?php $x = 0; foreach($slides['main'] as $slide): ?>
        <div class="image text-center">
            <div class="wrapper">
                <img data-src="{{ asset('images/gallery' . $slide) }}" />
                <span><?php echo ++$x; ?></span>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

    <div class="bordered-wrapper">
        <div class="container banner" data-image="{{ asset('images/banners') }}/032_AD5I6833mk-min.jpg">
            <div class="content title">
                Risque
                <div class="sub-title"></div>
            </div>
        </div>
    </div>

    <!-- second gallery: risquee -->
    <div class="container slider carousel risquee pull-down push-down">
        <?php $x = 0; foreach($slides['risquee'] as $slide): ?>
        <div class="image text-center">
            <div class="wrapper">
                <img data-src="{{ asset('images/gallery' . $slide) }}" />
                <span><?php echo ++$x; ?></span>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

    <div class="bordered-wrapper">
        <div class="container banner" data-image="{{ asset('images/banners') }}/111_AD5I8190mk-min.jpg">
            <div class="content title">
                Bloopers
                <div class="sub-title"></div>
            </div>
        </div>
    </div>

    <!-- third gallery: bloopers -->
    <div class="bordered-wrapper first">
        <div class="container slider carousel bloopers pull-down push-down">
            <?php $x = 0; foreach($slides['bloopers'] as $slide): ?>
            <div class="image text-center">
                <div class="wrapper">
                    <img data-src="{{ asset('images/gallery' . $slide) }}" />
                    <span><?php echo ++$x; ?></span>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
@endsection



@section('event_styles')
    <link rel="stylesheet" type="text/css" id="slick_slider_css"
        href="//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.css" />
    <link rel="stylesheet" type="text/css" id="slick_slider_theme"
        href="//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick-theme.min.css" />
@endsection

@section('event_scripts')
    <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.js"></script>
    <script>
        function preloadImages(i, o) {
            var $me = $(o),
                imgsrc = $me.attr('data-src');
            $me.attr('src', imgsrc).removeAttr('data-src');
        }

        function setupSlider(className, speedOffsetRatio) {
            speedOffsetRatio = speedOffsetRatio > 0 ? speedOffsetRatio : 1;
            return $(className + ' img').one('load', function() {
                $(className).not('.slick-initialized').slick({
                    dots: false,
                    useTransform: true,
                    autoplay: true,
                    centerPadding: '60px',
                    arrows: true,
                    infinite: true,
                    speed: 600 * speedOffsetRatio,
                    slidesToShow: 3,
                    adaptiveHeight: true,
                    slidesToScroll: 1,
                    cssEase: 'cubic-bezier(0.630, 0.005, 0.450, 1.040)',
                    centerMode: false,
                    variableWidth: false,
                    responsive: [{
                        breakpoint: 1400,
                        settings: {
                            arrows: true,
                            slidesToShow: 1,
                            centerMode: false,
                            variableWidth: false,
                            adaptiveHeight: false
                        }
                    }]
                });
            }).each(preloadImages);
        }

        setupSlider('.carousel.main-gallery', 1.01);
        setupSlider('.carousel.risquee', 1.11);
        setupSlider('.carousel.bloopers', 0.95);

        $('.carousel').on('init', function(event, slick) {
            var $current = $('.slick-slide[data-slick-index=0] .wrapper', slick.$list),
                h = $current.height(),
                box = $(event.currentTarget);
            box.height(h);
        });

        $('.carousel').on('beforeChange', function(event, slick, currentSlide, nextSlide) {
            var $next = $('.slick-slide[data-slick-index=' + (nextSlide) + '] .wrapper', slick.$list),
                h = $next.height(),
                box = $(event.currentTarget);
            box.height(h);
        });
    </script>
@endsection
