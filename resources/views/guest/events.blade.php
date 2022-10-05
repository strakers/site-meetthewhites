@extends('layouts.main')


@section('content')
    <div class="bordered-wrapper first">
        <div class="container banner" data-pos="50% 30%"
            data-image="https://ik.imagekit.io/strakez//thewhites/kbaptism/NicoleW-59_FrI_7UeTb.jpg?ik-sdk-version=javascript-1.4.3&updatedAt=2022-09-20T19:37:41.364Z">
            <div class="content title">
                Events
                <div class="sub-title"></div>
            </div>
        </div>
    </div>

    <div class="container pull-down push-down">
        <a href="{{ route('event', ['event' => 'wedding-recap']) }}">
            <div class="content basket bordered text-center">
                <div>Wedding Recap (2017)</div>
            </div>
        </a>
    </div>

    <div class="container pull-down push-down">
        <a href="{{ route('event', ['event' => 'baptism-22']) }}">
            <div class="content basket bordered text-center">
                <div>Kenedi's Baptism (2022)</div>
            </div>
        </a>
    </div>
@endsection
