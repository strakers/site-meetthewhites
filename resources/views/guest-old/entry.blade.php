@extends('layouts.main')

<?php if(!isset($page)) $page = App\Page::where('slug','guest')->first(); ?>

@section('content')
<?php $guest = session('guest') || []; ?>

<div class="bordered-wrapper first">
<div class="container banner" data-image="{{ asset('images/banners/029_AD5I6807mk-min.jpg') }}">
    <div class="content title">
        Welcome
        <div class="sub-title">{{ session('guest') ? session('guest')->name : 'Guest' }}</div>
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
<div class="container banner" data-image="{{ asset('images/banners/116_AD5I8202mk-min.jpg') }}">
    <div class="content title box">
        <div class="title-box">
            <div class="sub-title">{!! $page ? $page->content('welcome_quote')->content : '' !!}</div>
        </div>
    </div>
</div>
</div>
@endsection