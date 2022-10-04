@extends('layouts.main')

<?php if (!isset($page)) {
    $page = App\Page::where('slug', 'guest')->first();
} ?>

@section('content')
    <div class="bordered-wrapper first">
        <div class="container banner" data-image="{{ asset('images/gallery/meetthewhites_hands-sm-ed2-min.jpg') }}"
            data-pos="50% 67%">
            <div class="content title">
                Welcome
            </div>
        </div>
    </div>

    <div class="container pull-down push-down">
        <div class="content basket" role="main">
            <h2 class="heading">Michael x Nicole</h2>
            {!! $page ? $page->content('welcome_text')->content : '' !!}
            <div></div>
        </div>
    </div>

    <div class="bordered-wrapper">
        <div class="container banner" data-image="{{ asset('images/gallery/meetthewhites_viewtrees-sm-min.jpg') }}">
            <div class="content title box">
                <div class="title-box">
                    <div class="sub-title">{!! $page ? $page->content('welcome_quote')->content : '' !!}</div>
                </div>
            </div>
        </div>
    </div>
@endsection
