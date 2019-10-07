@extends('layouts.main')

@section('content')
<div class="bordered-wrapper first">
<div class="container banner" data-image="{{ asset('images/banners/066_AD5I6973mk_edited-1-min.jpg') }}" data-pos="46% 50%">
    <div class="content title">
        Proposal
        <div class="sub-title"></div>
    </div>
</div>
</div>

<div class="container pull-down push-down">
    <div class="content basket bordered text-justify" role="main">
        {!! $page ? $page->content('proposal_description')->content : '' !!}
        <div></div>
    </div>
</div>

<div class="bordered-wrapper ">
<div class="wide-container video">
    <div class="embed">
        <iframe src="https://player.vimeo.com/video/209511894" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
    </div>
</div>
</div>

<div class="bordered-wrapper first">
<div class="container pull-down push-down">
    <div class="content basket bordered">
        {!! $page ? $page->content('proposal_dialog')->content : '' !!}
        <div></div>
    </div>
</div>
    <br class="clearfix" />
</div>
@endsection