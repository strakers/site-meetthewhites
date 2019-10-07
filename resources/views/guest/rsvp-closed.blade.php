@extends('layouts.main')

@section('styles')
    <link rel="stylesheet" type="text/css" id="bootstrap_theme_css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" />
@endsection

@section('scripts')
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-checkbox/1.4.0/bootstrap-checkbox.min.js"></script>
    <script>
        (function($){
            $(':checkbox').checkboxpicker();
        })(jQuery);
    </script>
@endsection

@section('content')
    <div class="bordered-wrapper first">
        <div class="container banner" data-image="{{ asset('images/banners/092_AD5I8109mk-min.jpg') }}">
            <div class="content title">
                See you there!
                <div class="sub-title"></div>
            </div>
        </div>
    </div>

    <div class="container pull-down push-down">
        <div class="content basket pull-down" role="main">
            <h3><strong>The RSVP period has closed.</strong></h3>

            @if( !$guests[0]->has_responded )
            <p class="push-down">If you haven't RSVPed, please contact the bride and groom at <a href="mailto:meetthewhites@hotmail.com">meetthewhites@hotmail.com</a>.</p>

            @else
            <div class="row clearfix">
                <p class="push-down">You can review your current RSVP below, though you are no longer able to edit it. If you'd like to make changes, please contact the bride and groom at <a href="mailto:meetthewhites@hotmail.com">meetthewhites@hotmail.com</a>.</p></p>
                    @foreach($guests as $guest)

                        @if(0 !== $loop->index)
                            <div class="col-xs-11 push-down pull-down"></div>
                        @endif

                        <div class="guest-rsvp-fieldset form-closed">

                            <div class="form-group row">
                                <div class="col-md-12 text-left">
                                    <label for="email" class="control-label guest-name"><i class="fa fa-user"></i> {{ $guest->name }}</label>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-4 text-left">
                                    <label for="email" class="control-label required">Is Attending?</label>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-control rsvp-field outline">{{ $guest->is_attending ? 'Yes' : 'No' }}</div>
                                </div>
                            </div>

                            @foreach($metadata as $metafield)
                                <div class="form-group row {{$metafield->slug}}">
                                    <div class="col-md-4 text-left">
                                        <label for="email" class="control-label">{{ $metafield->name }}</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-control rsvp-field outline" style="height:auto;">{{ $guest->getResponseValue($metafield->id) ? $guest->getResponseValue($metafield->id) : "n/a" }}</div>
                                    </div>
                                </div>
                            @endforeach

                        </div>

                    @endforeach

                    <hr class="col-xs-11 push-down pull-down" />
                    <div class="col-xs-12 push-down">
                        <h3 class="push-down">Music Selection</h3>

                        @for($i=0;$i<3;++$i)
                            <p><strong>{{ $songs[$i]->artist }}</strong> - {{ $songs[$i]->title }}</p>
                        @endfor
                    </div>

            </div>
            @endif
        </div>
    </div>

    <div class="bordered-wrapper">
        <div class="container banner" data-image="{{ asset('images/banners/101_AD5I8163mk-min.jpg') }}"></div>
    </div>

@endsection


@section('scripts')
    <script>
        (function($){
            $('.songlist-set.new').hide().first().show();
            $('input','.songlist-set.new').on('keyup',function(e){
                console.log('enter');
                var $me = $(this), $parent = $me.parents('.songlist-set.new');
                if( $me.val() ){
                    console.log('keypress',$me.val());
                    $parent.next('.songlist-set.new').show();
                }
            });
        })(jQuery);
    </script>
@endsection