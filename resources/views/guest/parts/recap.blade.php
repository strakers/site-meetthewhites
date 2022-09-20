@extends('layouts.main')

@section('content')
<div class="bordered-wrapper first">
<div class="container banner" data-image="{{ asset('images/gallery/meetthewhites_churchsit-min.jpg') }}" data-pos="45% 40%" data-top="46%">
    <div class="content title">
        Remember
        <div class="sub-title"></div>
    </div>
</div>
</div>

<div class="container pull-down push-down">
    <div class="content basket bordered text-justify" role="main">
        {!! $page ? $page->content('recap_description')->content : '' !!}
        <div></div>
    </div>
</div>

<div class="bordered-wrapper ">
<div class="wide-container video">
    <div class="embed">
        <iframe src="https://player.vimeo.com/video/446983538" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
    </div>
</div>
</div>

<div class="bordered-wrapper first">
<div class="container pull-down push-down">
    <div class="content basket bordered">
        {!! $page ? $page->content('recap_dialog')->content : '' !!}
        <div></div>
    </div>
</div>
    <br class="clearfix" />
</div>
@endsection
