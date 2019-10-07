@extends('layouts.main')

@section('content')
<div class="bordered-wrapper first">
<div class="container banner" data-image="{{ asset('images/gallery/meetthewhites_churchsit-min.jpg') }}" data-pos="45% 40%" data-top="46%">
    <div class="content title">
        From Us to You
        <div class="sub-title"></div>
    </div>
</div>
</div>

<div class="container pull-down push-down">
    <div class="content basket" role="main">
        {!! content($page,'thank_you_message') !!}
        <div></div>
    </div>
</div>

<div class="bordered-wrapper">
    <div class="container banner" data-image="{{ asset('images/banners/meetthewhites_group_min-min.jpg') }}" data-pos="40% 50%" data-top="32%">
    {{--<div class="container banner" data-image="{{ asset('images/banners/024_AD5I6799mk2-min.jpg') }}" data-pos="67% 50%">--}}
        <div class="content title">
            Thank you
            <div class="sub-title"></div>
        </div>
    </div>
</div>
@endsection