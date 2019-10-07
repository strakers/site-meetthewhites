@extends('layouts.main')

@section('content')
<div class="container banner" data-image="{{ asset('images/banners/069_AD5I7001mk2-min.jpg') }}">
    <div class="content title">
        Oops
        <div class="sub-title">We couldn't find <br />the page you're <br />looking for.</div>
    </div>
</div>

<div class="container pull-down push-down">
    <div class="content basket" role="main">
        <p>Please go <a href="#" onclick="history.back()">back</a> or try another link.</p>
        <div></div>
    </div>
</div>
@endsection