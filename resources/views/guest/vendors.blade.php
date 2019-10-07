@extends('layouts.main')

@section('styles')
    <style type="text/css">
        .control-label {
            font-weight: 600;
        }
    </style>
@endsection

@section('content')
    <div class="bordered-wrapper first">
        <div class="container banner" data-image="{{ asset('images/gallery/meetthewhites_dancing_cropped2-min.jpg') }}" data-pos="55% 50%" data-top="36%">
            <div class="content title">
                Special Mentions
                <div class="sub-title"></div>
            </div>
        </div>
    </div>

    <div class="container pull-down push-down">
        <div class="content basket" role="main">
            {{--{!! content($page,'thank_you_message') !!}--}}
            <p>This day was not possible without the excellent execution and professionalism exemplified by our amazing vendors. We received the utmost best customer service and attention to detail. Definitely meetthewhites approved!!!!</p>

            <hr />
            <h3 class="push-down pull-down gold">Planning and logistics</h3>
            <div class="guest-rsvp-fieldset">

                <div class="form-group row top-bordered">
                    <div class="col-md-12 text-left">
                        <div class="col-md-4 text-left">
                            <p class="control-label">Event planners</p>
                        </div>
                        <div class="col-md-6">
                            <p>Nicole White - <a href="mailto:nicole@fourbrowngirls.com">nicole@fourbrowngirls.com</a><br />
                                Nina Ghassemi - <a href="mailto:nina@foreverinaday.ca">nina@foreverinaday.ca</a>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="form-group row top-bordered">
                    <div class="col-md-12 text-left">
                        <div class="col-md-4 text-left">
                            <p class="control-label">Logistics</p>
                        </div>
                        <div class="col-md-6">
                            <p>Tamraa Greenidge (aka BFF and bridesmaid)<br />
                                My Madre</p>
                        </div>
                    </div>
                </div>

                <div class="form-group row top-bordered">
                    <div class="col-md-12 text-left">
                        <div class="col-md-4 text-left">
                            <p class="control-label">Coordinator</p>
                        </div>
                        <div class="col-md-6">
                            <p>Jayne Mandat - <a href="mailto:pr@fourbrowngirls.com">pr@fourbrowngirls.com</a></p>
                        </div>
                    </div>
                </div>

                <div class="form-group row top-bordered">
                    <div class="col-md-12 text-left">
                        <div class="col-md-4 text-left">
                            <p class="control-label">Invitations</p>
                        </div>
                        <div class="col-md-6">
                            <p>Cry If I Want To - <a href="//cryifiwantto.com" target="_blank">cryifiwantto.com</a></p>
                        </div>
                    </div>
                </div>

                <div class="form-group row top-bordered">
                    <div class="col-md-12 text-left">
                        <div class="col-md-4 text-left">
                            <p class="control-label">Website</p>
                        </div>
                        <div class="col-md-6">
                            <p>My fabulous cousin - Steven Straker</p>
                        </div>
                    </div>
                </div>

                <div class="form-group row top-bordered">
                    <div class="col-md-12 text-left">
                        <div class="col-md-4 text-left">
                            <p class="control-label">Miscellaneous</p>
                        </div>
                        <div class="col-md-6">
                            <p>Jamilah and Hasan Jean</p>
                            <p>Sheron</p>
                        </div>
                    </div>
                </div>

            </div>


            <hr />
            <h3 class="push-down pull-down gold">Food and Beverages</h3>
            <div class="guest-rsvp-fieldset">

                <div class="form-group row top-bordered">
                    <div class="col-md-12 text-left">
                        <div class="col-md-4 text-left">
                            <p class="control-label">Catering</p>
                        </div>
                        <div class="col-md-6">
                            <p>Traiteur Brera - <a href="mailto:info@traiteurbrera.com">info@traiteurbrera.com</a></p>
                        </div>
                    </div>
                </div>

                <div class="form-group row top-bordered">
                    <div class="col-md-12 text-left">
                        <div class="col-md-4 text-left">
                            <p class="control-label">Midnight Bar</p>
                        </div>
                        <div class="col-md-6">
                            <p>Dawn and Timmy</p>
                        </div>
                    </div>
                </div>

                <div class="form-group row top-bordered">
                    <div class="col-md-12 text-left">
                        <div class="col-md-4 text-left">
                            <p class="control-label">Haitian booth</p>
                        </div>
                        <div class="col-md-6">
                            <p>Nicole's Family - Marlene & Horal</p>
                        </div>
                    </div>
                </div>

                <div class="form-group row top-bordered">
                    <div class="col-md-12 text-left">
                        <div class="col-md-4 text-left">
                            <p class="control-label">Cake</p>
                        </div>
                        <div class="col-md-6">
                            <p>Bbakery - <a href="mailto:info@bbakery.ca">info@bbakery.ca</a></p>
                        </div>
                    </div>
                </div>

                <div class="form-group row top-bordered">
                    <div class="col-md-12 text-left">
                        <div class="col-md-4 text-left">
                            <p class="control-label">Bartenders</p>
                        </div>
                        <div class="col-md-6">
                            <p>Rodrigues Sisters - <a href="mailto:patricia_rod@hotmail.ca">patricia_rod@hotmail.ca</a></p>
                        </div>
                    </div>
                </div>

                <div class="form-group row top-bordered">
                    <div class="col-md-12 text-left">
                        <div class="col-md-4 text-left">
                            <p class="control-label">Pre Wedding food</p>
                        </div>
                        <div class="col-md-6">
                            <p>Don Smooth and Nicole</p>
                        </div>
                    </div>
                </div>

            </div>


            <hr />
            <h3 class="push-down pull-down gold">Decor</h3>
            <div class="guest-rsvp-fieldset">

                <div class="form-group row top-bordered">
                    <div class="col-md-12 text-left">
                        <div class="col-md-4 text-left">
                            <p class="control-label">DIY</p>
                        </div>
                        <div class="col-md-6">
                            <p>Nicole and Nina</p>
                        </div>
                    </div>
                </div>

                <div class="form-group row top-bordered">
                    <div class="col-md-12 text-left">
                        <div class="col-md-4 text-left">
                            <p class="control-label">Rentals</p>
                        </div>
                        <div class="col-md-6">
                            <p>Festi Fetes - <a href="mailto:cedric@divalocation.com">cedric@divalocation.com</a></p>
                        </div>
                    </div>
                </div>

                <div class="form-group row top-bordered">
                    <div class="col-md-12 text-left">
                        <div class="col-md-4 text-left">
                            <p class="control-label">Flowers</p>
                        </div>
                        <div class="col-md-6">
                            <p>Flora International - <a href="mailto:caitlin@florainternationalflowers.com">caitlin@florainternationalflowers.com</a></p>
                        </div>
                    </div>
                </div>

                <div class="form-group row top-bordered">
                    <div class="col-md-12 text-left">
                        <div class="col-md-4 text-left">
                            <p class="control-label">Signage</p>
                        </div>
                        <div class="col-md-6">
                            <p>Fael Francois - <a href="mailto:pr@fourbrowngirls.com">pr@fourbrowngirls.com</a></p>
                        </div>
                    </div>
                </div>

                <div class="form-group row top-bordered">
                    <div class="col-md-12 text-left">
                        <div class="col-md-4 text-left">
                            <p class="control-label">Logo design,<br class="hidden-xs" /> Snapchat filter,<br class="hidden-xs" /> Table seating</p>
                        </div>
                        <div class="col-md-6">
                            <p>Jayne Mandat - <a href="mailto:pr@fourbrowngirls.com">pr@fourbrowngirls.com</a></p>
                        </div>
                    </div>
                </div>

                <div class="form-group row top-bordered">
                    <div class="col-md-12 text-left">
                        <div class="col-md-4 text-left">
                            <p class="control-label">Custom bandanas</p>
                        </div>
                        <div class="col-md-6">
                            <p>SakPaseToronto</p>
                        </div>
                    </div>
                </div>

                <div class="form-group row top-bordered">
                    <div class="col-md-12 text-left">
                        <div class="col-md-4 text-left">
                            <p class="control-label">Venue</p>
                        </div>
                        <div class="col-md-6">
                            <p>Sarto Desnoyers - <a href="mailto:smichalovic@ville.dorval.qc.ca">smichalovic@ville.dorval.qc.ca</a></p>
                        </div>
                    </div>
                </div>

            </div>


            <hr />
            <h3 class="push-down pull-down gold">Photography</h3>
            <div class="guest-rsvp-fieldset">

                <div class="form-group row top-bordered">
                    <div class="col-md-12 text-left">
                        <div class="col-md-4 text-left">
                            <p class="control-label">MK Photography</p>
                        </div>
                        <div class="col-md-6">
                            <p><a href="mailto:maria.kamisis@gmail.com">maria.kamisis@gmail.com</a></p>
                        </div>
                    </div>
                </div>

                <div class="form-group row top-bordered">
                    <div class="col-md-12 text-left">
                        <div class="col-md-4 text-left">
                            <p class="control-label">Gifted Visions</p>
                        </div>
                        <div class="col-md-6">
                            <p><a href="mailto:giftedvisionsmedia17@gmail.com">giftedvisionsmedia17@gmail.com</a></p>
                        </div>
                    </div>
                </div>

                <div class="form-group row top-bordered">
                    <div class="col-md-12 text-left">
                        <div class="col-md-4 text-left">
                            <p class="control-label">Flowers</p>
                        </div>
                        <div class="col-md-6">
                            <p>Flora International - <a href="mailto:caitlin@florainternationalflowers.com">caitlin@florainternationalflowers.com</a></p>
                        </div>
                    </div>
                </div>

                <div class="form-group row top-bordered">
                    <div class="col-md-12 text-left">
                        <div class="col-md-4 text-left">
                            <p class="control-label">Unofficial photagrapher</p>
                        </div>
                        <div class="col-md-6">
                            <p>Shane Guenin - G media</p>
                        </div>
                    </div>
                </div>

            </div>


            <hr />
            <h3 class="push-down pull-down gold">Beauty</h3>
            <div class="guest-rsvp-fieldset">

                <div class="form-group row top-bordered">
                    <div class="col-md-12 text-left">
                        <div class="col-md-4 text-left">
                            <p class="control-label">Makeup & Hair</p>
                        </div>
                        <div class="col-md-6">
                            <p>Achaia Select</p>
                            <p>Sassy Salon</p>
                        </div>
                    </div>
                </div>

                <div class="form-group row top-bordered">
                    <div class="col-md-12 text-left">
                        <div class="col-md-4 text-left">
                            <p class="control-label">Nails</p>
                        </div>
                        <div class="col-md-6">
                            <p>Buff Nails</p>
                            <p>Vikky Nails</p>
                        </div>
                    </div>
                </div>

                <div class="form-group row top-bordered">
                    <div class="col-md-12 text-left">
                        <div class="col-md-4 text-left">
                            <p class="control-label">Makeup Bridal party</p>
                        </div>
                        <div class="col-md-6">
                            <p>Sparks MUA (Sophia) - <a href="mailto:Ld.sparks20@gmail.com">Ld.sparks20@gmail.com</a></p>
                        </div>
                    </div>
                </div>

            </div>


            <hr />
            <h3 class="push-down pull-down gold">Entertainment</h3>
            <div class="guest-rsvp-fieldset">

                <div class="form-group row top-bordered">
                    <div class="col-md-12 text-left">
                        <div class="col-md-4 text-left">
                            <p class="control-label">Music</p>
                        </div>
                        <div class="col-md-6">
                            <p>DJ Star Q - <a href="mailto:superstarq@gmail.com">superstarq@gmail.com</a></p>
                        </div>
                    </div>
                </div>

                <div class="form-group row top-bordered">
                    <div class="col-md-12 text-left">
                        <div class="col-md-4 text-left">
                            <p class="control-label">MC</p>
                        </div>
                        <div class="col-md-6">
                            <p>Follow da Riddim <br />- Email: <a href="mailto:followdariddim11@gmail.com">followdariddim11@gmail.com</a> <br />- Phone: <a href="tel:+15148855973">514-885-5973</a></p>
                        </div>
                    </div>
                </div>

                <div class="form-group row top-bordered">
                    <div class="col-md-12 text-left">
                        <div class="col-md-4 text-left">
                            <p class="control-label">Lighting & Sound</p>
                        </div>
                        <div class="col-md-6">
                            <p>Agence 4 Saison</p>
                        </div>
                    </div>
                </div>

                <div class="form-group row top-bordered">
                    <div class="col-md-12 text-left">
                        <div class="col-md-4 text-left">
                            <p class="control-label">Drummers</p>
                        </div>
                        <div class="col-md-6">
                            <p>Rhythm Makers (Jimmy) - <a href="tel:+15149746026">514-974-6026</a></p>
                        </div>
                    </div>
                </div>

                <div class="form-group row top-bordered">
                    <div class="col-md-12 text-left">
                        <div class="col-md-4 text-left">
                            <p class="control-label">Church Singer</p>
                        </div>
                        <div class="col-md-6">
                            <p>Alyssa Walton</p>
                        </div>
                    </div>
                </div>

                <div class="form-group row top-bordered">
                    <div class="col-md-12 text-left">
                        <div class="col-md-4 text-left">
                            <p class="control-label">Custom bandanas</p>
                        </div>
                        <div class="col-md-6">
                            <p>SakPaseToronto</p>
                        </div>
                    </div>
                </div>

                <div class="form-group row top-bordered">
                    <div class="col-md-12 text-left">
                        <div class="col-md-4 text-left">
                            <p class="control-label">Shisha Bar</p>
                        </div>
                        <div class="col-md-6">
                            <p><a href="mailto:Abdallah.moudarres@gmail.com">Abdallah.moudarres@gmail.com</a></p>
                        </div>
                    </div>
                </div>

            </div>


            <hr />
            <h3 class="push-down pull-down gold">Transport</h3>
            <div class="guest-rsvp-fieldset">

                <div class="form-group row top-bordered">
                    <div class="col-md-12 text-left">
                        <div class="col-md-4 text-left">
                            <p class="control-label">Limousine</p>
                        </div>
                        <div class="col-md-6">
                            <p>Broadway - <a href="mailto:limo@limousinebroadway.com">limo@limousinebroadway.com</a></p>
                        </div>
                    </div>
                </div>

                <div class="form-group row top-bordered">
                    <div class="col-md-12 text-left">
                        <div class="col-md-4 text-left">
                            <p class="control-label">Other</p>
                        </div>
                        <div class="col-md-6">
                            <p>Kelz and Brit</p>
                        </div>
                    </div>
                </div>

            </div>


            <hr />
            <h3 class="push-down pull-down gold">Special Notes</h3>
            <div class="guest-rsvp-fieldset">

                <div class="form-group row top-bordered">
                    <div class="col-md-12 text-center">
                        <p>Set Up and tear down: Bridesmaids - I love you ladies</p>
                    </div>
                </div>

                <div class="form-group row top-bordered">
                    <div class="col-md-12 text-center">
                        <p>Tita and Madre: you guys support my craziest dreams</p>
                    </div>
                </div>

                <div class="form-group row top-bordered">
                    <div class="col-md-12 text-center">
                        <p>Aisha, Horal, Jack, Gabby, Kassi, Charlene, Aunty Hermina, Alison, Rochelle, Steven, Patrick, Richild, Kelsey, Shayne, KJ, Aundreas. All the guest that stayed at the end of the night to help pack up!!</p>
                    </div>
                </div>

                <div class="form-group row top-bordered">
                    <div class="col-md-12 text-center">
                        <p>
                            I know for sure I am forgetting people...but we love you and appreciate you to the moon and back for selflessly helping us achieve the wedding of our dreams!</p>
                    </div>
                </div>

            </div>

            <div></div>
        </div>
    </div>

    <div class="bordered-wrapper">
        <div class="container banner" data-image="{{ asset('images/gallery/meetthewhites_exit-min.jpg') }}" data-pos="39% 50%">
            <div class="content title">
                Thank you
                <div class="sub-title"></div>
            </div>
        </div>
    </div>
@endsection