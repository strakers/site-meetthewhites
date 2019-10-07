@extends('layouts.main')

@section('styles')
    <link rel="stylesheet" type="text/css" id="slick_slider_css" href="//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.css" />
    <link rel="stylesheet" type="text/css" id="slick_slider_theme" href="//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick-theme.min.css" />
@endsection

@section('scripts')
    <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.js"></script>
    <script>
        function preloadImages(i,o){
            var $me = $(o), imgsrc = $me.attr('data-src');
            $me.attr('src', imgsrc).removeAttr('data-src');
        }

        function setupSlider(className, speedOffsetRatio){
            speedOffsetRatio = speedOffsetRatio > 0 ? speedOffsetRatio : 1;
            return $(className + ' img').one('load',function(){
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
                    responsive: [
                        {
                            breakpoint: 1400,
                            settings: {
                                arrows: true,
                                slidesToShow: 1,
                                centerMode: false,
                                variableWidth: false,
                                adaptiveHeight: false
                            }
                        }
                    ]
                });
            }).each(preloadImages);
        }

        setupSlider('.carousel.main-gallery', 1.01);
        setupSlider('.carousel.risquee', 1.11);
        setupSlider('.carousel.bloopers', 0.95);

        $('.carousel').on('init', function(event, slick){
            var $current = $('.slick-slide[data-slick-index=0] .wrapper',slick.$list), h = $current.height(), box = $(event.currentTarget);
            box.height(h);
        });

        $('.carousel').on('beforeChange', function(event, slick, currentSlide, nextSlide){
            var $next = $('.slick-slide[data-slick-index='+(nextSlide)+'] .wrapper',slick.$list), h = $next.height(), box = $(event.currentTarget);
            box.height(h);
        });

    </script>
@endsection

<?php
$slides = [
        'crew' => [
                "/bridesmaid1.jpg",
                "/bridesmaid2.jpg",
                "/bridesmaid3.jpg",
                "/bridesmaid6.jpg",
                "/bridesmaid45.jpg",
                "/groomsman6.jpg",
                "/mike-groom1.jpg",
                "/mike-groom2.jpg",
                "/mike-groom3.jpg",
                "/mike-groom4.jpg",
                "/mike-groom5.jpg",
        ]
];
?>

@section('content')
    <div class="bordered-wrapper first visible-lg">
        <div class="container banner" data-image="{{ asset('images/gallery') }}/IMG-20170915-WA0015-min.jpg" data-pos="70% 50%" data-top="62%">
            <div class="content title">
                Meet the Crew
                <div class="sub-title"></div>
            </div>
        </div>
    </div>

    <div class="bordered-wrapper first hidden-lg">
        <div class="wide-container video">
            <img src="http://meetthewhites.ca/site/public/images/gallery/IMG-20170915-WA0015-min.jpg" class="img-responsive">
        </div>
    </div>

    <div class="container pull-down">
        <div class="content basket row" role="main">
            <div class="col-md-6 col-xs-12 push-down">
                <div class="crew-members">
                    <h3 class="crew-group heading">ladies</h3>
                    <div class="crew-member row">
                        <div class="col-xs-6 text-right crew-name">Jessica Wilson</div>
                        <div class="col-xs-6 text-left crew-title">MOH</div>
                    </div>
                    <div class="crew_member row">
                        <div class="col-xs-6 text-right crew-name">Katrina Nurse</div>
                        <div class="col-xs-6 text-left crew-title">Bridesmaid</div>
                    </div>
                    <div class="crew_member row">
                        <div class="col-xs-6 text-right crew-name">Tamraa Greenidge</div>
                        <div class="col-xs-6 text-left crew-title">Bridesmaid</div>
                    </div>
                    <div class="crew_member row">
                        <div class="col-xs-6 text-right crew-name">Nina Ghassemi</div>
                        <div class="col-xs-6 text-left crew-title">Bridesmaid</div>
                    </div>
                    <div class="crew_member row">
                        <div class="col-xs-6 text-right crew-name">Marissa Lapointe</div>
                        <div class="col-xs-6 text-left crew-title">Bridesmaid</div>
                    </div>
                    <div class="crew_member row">
                        <div class="col-xs-6 text-right crew-name">Shaina Thornhill</div>
                        <div class="col-xs-6 text-left crew-title">Bridesmaid</div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xs-12 push-down">
                <div class="crew-members">
                    <h3 class="crew-group heading">fellas</h3>
                    <div class="crew-member row">
                        <div class="col-xs-6 text-right crew-name">Ian Thomas</div>
                        <div class="col-xs-6 text-left crew-title">Best Man</div>
                    </div>
                    <div class="crew_member row">
                        <div class="col-xs-6 text-right crew-name">Ryan White</div>
                        <div class="col-xs-6 text-left crew-title">Groomsman</div>
                    </div>
                    <div class="crew_member row">
                        <div class="col-xs-6 text-right crew-name">KJ Mitchell</div>
                        <div class="col-xs-6 text-left crew-title">Groomsman</div>
                    </div>
                    <div class="crew_member row">
                        <div class="col-xs-6 text-right crew-name">Todd White-Francis</div>
                        <div class="col-xs-6 text-left crew-title">Groomsman</div>
                    </div>
                    <div class="crew_member row">
                        <div class="col-xs-6 text-right crew-name">Daniel Mightley</div>
                        <div class="col-xs-6 text-left crew-title">Groomsman</div>
                    </div>
                    <div class="crew_member row">
                        <div class="col-xs-6 text-right crew-name">Tranell Antoine</div>
                        <div class="col-xs-6 text-left crew-title">Groomsman</div>
                    </div>
                </div>
            </div>
            <div></div>
        </div>
    </div>

    <!-- first gallery: main -->
    <div class="bordered-wrapper ">
        <div class="container slider carousel main-gallery pull-down push-down">
            <?php $x = 0; foreach($slides['crew'] as $slide): ?>
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