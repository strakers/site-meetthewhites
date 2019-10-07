@extends('layouts.main')

@section('content')
<div class="bordered-wrapper first">
<div class="container banner" data-image="{{ asset('images/banners/015_AD5I6788mk1-min.jpg') }}" data-pos="50% 50%">
    <div class="content title">
        Where and When
        <div class="sub-title"></div>
    </div>
</div>
</div>

<div class="container pull-down push-down">
    <div class="content basket row" role="main">
        <div class="col-md-6 col-xs-12 push-down">
            <div class="bordered">
            <h3>Church</h3>
                {!! content($page,'church_details') !!}
            </div>
        </div>
        <div class="col-md-6 col-xs-12 push-down">
            <div class="bordered">
            <h3>Reception</h3>
                {!! content($page,'reception_details') !!}
            </div>
        </div>
    </div>
</div>

<div class="bordered-wrapper ">
<div class="container banner" data-image="{{ asset('images/banners/008_AD5I6768mk-min.jpg') }}" data-pos="50% 50%" data-top="59%">
    <div class="content title">
        Details
        <div class="sub-title"></div>
    </div>
</div>
</div>

<div class="container pull-down push-down">
    <div class="content basket row">
        <div class="col-md-12 col-xs-12">
            <p>Estimated Travel Time: 20-25 mins</p>
        </div>
        <hr class="col-xs-12 hr-fit" />
        <div class="col-md-4 col-xs-12 push-down">
            <h3>Reception Parking</h3>
            {!! content($page,'reception_parking') !!}
        </div>
        <div class="col-md-4 col-xs-12 push-down">
            <h3>Attire</h3>
            {!! content($page,'attire') !!}
        </div>
        <div class="col-md-4 col-xs-12 push-down">
            <h3>Media</h3>
            {!! content($page,'media') !!}
        </div>
        <div class="col-md-12 col-xs-12 push-down">
            <h3>Children</h3>
            {!! content($page,'children') !!}
        </div>
    </div>
</div>

<div class="bordered-wrapper ">
<div class="container banner" data-image="{{ asset('images/banners/026_AD5I6802mk6-min.jpg') }}" data-top="55%">
    <div class="content title">
        Out of Towners
        <div class="sub-title"></div>
    </div>
</div>
</div>

<div class="bordered-wrapper first">
<div class="container pull-down push-down">
    <div class="content basket row">
        <div class="col-md-4 col-xs-12 push-down">
            <h3>Airport Information</h3>
            {!! content($page,'airport_information') !!}
        </div>
        <div class="col-md-4 col-xs-12 push-down">
            <h3>Train Information</h3>
            {!! content($page,'train_information') !!}
        </div>
        <div class="col-md-4 col-xs-12 push-down">
            <h3>Bus Information</h3>
            {!! content($page,'bus_information') !!}
        </div>
        <hr class="col-xs-12 hr-fit push-down" />
        <div class="col-xs-12 push-down">
            <h3>Hotel Information</h3>
        </div>
        <div class="col-md-4 col-xs-12 push-down">
            {!! content($page,'hotel_information') !!}
        </div>
        <div class="col-md-4 col-xs-12 push-down">
            {!! content($page,'hotel_information_2') !!}
        </div>
        <div class="col-md-4 col-xs-12 push-down">
            {!! content($page,'hotel_information_3') !!}
        </div>
        <hr class="col-xs-12 hr-fit push-down" />
        <div class="col-md-12 col-xs-12 push-down">
            <h3>Alternatives</h3>
            <p>Flights into the following nearby airports may be available at a lower cost depending on your originating airport.</p>

            <div class="col-md-6 col-xs-12 pull-down">
                {!! content($page,'alt_flights_1') !!}
            </div>
            <div class="col-md-6 col-xs-12 pull-down">
                {!! content($page,'alt_flights_2') !!}
            </div>
        </div>
    </div>
</div>
</div>
@endsection