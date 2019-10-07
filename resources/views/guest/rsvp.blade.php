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
        Join Us
        <div class="sub-title"></div>
    </div>
</div>
</div>

<div class="container pull-down push-down">
    <div class="content basket" role="main">
        @if( !$guests[0]->has_responded )
            <h3>{!! content($page,'rsvp_lead_text') !!}</h3>
            <hr class="col-xs-11 push-down" />
        @else
            <h3>Thank you for your RSVP</h3>
            <p>XOXO Future Mr. &amp; Mrs. White</p>
            <hr class="col-xs-11 push-down" />
            <p class="col-xs-12">You can update your response{{ count($guests) > 1 ? 's' : '' }} below:</p>
        @endif
        <div class="row">
            <form class="form-horizontal{{ $errors->has('name') ? ' has-error' : '' }}" role="form" method="POST" action="{{ route('guest.rsvp') }}">
                {{ csrf_field() }}
                <input name="invite_id" type="hidden" value="{{ session('guest')->id }}">

                @foreach($guests as $guest)

                    @if(0 !== $loop->index)
                        <div class="col-xs-11 push-down pull-down"></div>
                    @endif

                    <div class="guest-rsvp-fieldset">

                        <div class="form-group row">
                            <div class="col-md-12 text-left">
                                @if( !$guest->is_named )
                                    <div class="col-md-4 text-left">
                                        <label for="email" class="control-label guest-name {{ strpos($guest->name,'Guest') !== false ? 'required' : '' }}"><i class="fa fa-user{{ !$guest->is_named ? '-plus' : '' }}"></i> {{ $guest->name }}</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input id="field_name_{{ $guest->id }}" type="text" name="guests[{{ $guest->id }}][name]" {{ $guest->name }} class="form-control outline" placeholder="Update guest name here"  value="{{ strpos($guest->name,'Guest') !== false ? '' : $guest->name }}" />
                                    </div>
                                @else
                                    <label for="email" class="control-label guest-name"><i class="fa fa-user"></i> {{ $guest->name }}</label>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4 text-left">
                                <label for="email" class="control-label required">Is Attending?</label>
                            </div>
                            <div class="col-md-6">
                                <div class="checkbox">
                                    <input id="field_{{ $guest->id }}" type="checkbox" name="guests[{{ $guest->id }}][is_attending]" {{ $guest->is_attending ? 'checked' : '' }} data-group-cls="btn-group-justified">
                                </div>
                            </div>
                        </div>

                        @foreach($metadata as $metafield)
                            <div class="form-group row {{$metafield->slug}}">
                                <div class="col-md-4 text-left">
                                    <label for="email" class="control-label">{{ $metafield->name }}</label>
                                </div>
                                <div class="col-md-6">
                                    @if( $metafield->metafield_type_id == 1 )
                                        <div class="checkbox">
                                            <input id="meta_{{ $guest->id }}" type="text" name="guests[{{ $guest->id }}][meta][{{$metafield->id}}]" class="form-control outline" value="{{ $guest->getResponseValue($metafield->id) }}">
                                        </div>
                                    @elseif( $metafield->metafield_type_id == 2 )
                                        {{-- fill in option field here --}}
                                    @elseif( $metafield->metafield_type_id == 3 )
                                        <select id="meta_{{ $guest->id }}_{{ $metafield->id }}" class="form-control rsvp-field outline" name="guests[{{ $guest->id }}][meta][{{$metafield->id}}]">
                                            @if( $metafield->options && is_array($metafield->options) )
                                                @foreach($metafield->options as $option)
                                                    <option {{ $guest->getResponseValue($metafield->id) === $option ? ' selected' : '' }}>{{ $option }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    @elseif( $metafield->metafield_type_id == 4 )
                                        {{-- fill in option field here --}}
                                    @endif
                                </div>
                            </div>
                        @endforeach

                    </div>

                @endforeach

                <hr class="col-xs-11 push-down pull-down" />
                <div class="col-xs-12 push-down">
                    <h3 class="push-down">Play My Jam</h3>
                    <p>{!! content($page,'rsvp_music_text') !!}</p>
                </div>

                @for($i=0;$i<3;++$i)

                    @if(array_key_exists($i,$songs->all()))
                        @include('guest.parts.song',[
                            'song_id' => $songs[$i]->id,
                            'artist' => $songs[$i]->artist,
                            'title' => $songs[$i]->title,
                            'index' => $i
                        ])
                    @else
                        @include('guest.parts.song',[ 'index' => $i ])
                    @endif

                @endfor

                <hr class="col-xs-11 push-down pull-down" />

                <div class="form-group">
                    <div class="col-md-12 push-down">
                        <button type="submit" class="btn btn-primary btn-lg btn-themed">Submit RSVP</button>
                    </div>
                </div>

            </form>
        </div>
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