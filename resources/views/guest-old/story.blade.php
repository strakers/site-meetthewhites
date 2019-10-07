@extends('layouts.main')

@section('content')
<div class="bordered-wrapper first">
<div class="container banner" data-image="{{ asset('images/banners/035_AD5I6844mk-min.jpg') }}" data-pos="36% 50%" data-top="58%">
    <div class="content title">
        Meet The Whites
        <div class="sub-title"></div>
    </div>
</div>
</div>

<div class="container pull-down push-down">
    <div class="content basket bordered ">
        <p class="allcaps">Our story</p>
        {!! $page ? $page->content('story_lead')->content : '' !!}
        <div></div>
    </div>
</div>

<div class="bordered-wrapper ">
<div class="container banner" data-image="{{ asset('images/banners/054_AD5I6896mk-min.jpg') }}" data-pos="65% 50%" data-top="62%">
    <div class="content title">
        Her Side
        <div class="sub-title"></div>
    </div>
</div>
</div>

<div class="container pull-down push-down">
    <div class="content basket bordered text-justify">
        {!! $page ? $page->content('her_story')->content : '' !!}
        <div></div>
    </div>
</div>

<div class="bordered-wrapper ">
<div class="container banner" data-image="{{ asset('images/banners/057_AD5I6905mk-min.jpg') }}">
    <div class="content title">
        His Side
        <div class="sub-title"></div>
    </div>
</div>
</div>

<div class="container pull-down push-down">
    <div class="content basket bordered text-justify">
        {!! $page ? $page->content('his_story')->content : '' !!}
        <div></div>
    </div>
</div>

<div class="bordered-wrapper ">
<div class="container banner" data-image="{{ asset('images/banners/045_AD5I6873mk-min.jpg') }}" data-pos="60% 50%" data-top="55%">
    <div class="content title">
        <p class="raisex">Reality</p>
        <div class="sub-title">How it really went down</div>
    </div>
</div>
</div>

<div class="container pull-down push-down">
    <div class="content basket bordered text-center">
        {!! $page ? $page->content('the_truth')->content : '' !!}
        <div></div>
    </div>
</div>

{{--055_AD5I6902mk-min.jpg--}}
<div class="bordered-wrapper ">
<div class="container banner" data-image="{{ asset('images/banners/Scan-2017-4-16-0003.jpg') }}" data-scale="true" data-pos="62% 50%">
    <div class="content title">
        A love story
        <div class="sub-title">{!! $page ? $page->content('story_quote')->content : '' !!}</div>
    </div>
</div>
</div>
@endsection