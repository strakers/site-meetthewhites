@php
    $song_status = isset($song_id) ? 'saved' : 'new';
    $index = isset($index) ? $index : 0;
    $song_id = isset($song_id) ? $song_id : $index;
    $artist = isset($artist) ? $artist : '';
    $title = isset($title) ? $title : '';
@endphp


<div class="guest-rsvp-fieldset songlist-set {{ $song_status }}">

    <div class="form-group row">
        <div class="col-md-12 text-left">
            <label for="email" class="control-label guest-name"><i class="fa fa-music"></i> Song {{ $index + 1 }}</label>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-4 text-left">
            <label for="email" class="control-label">Artist</label>
        </div>
        <div class="col-md-6">
            <input class="form-control" placeholder="Artist" type="text" name="songs[{{ $song_status }}][{{ $song_id }}][artist]" value="{{ $artist }}" />
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-4 text-left">
            <label for="email" class="control-label">Title</label>
        </div>
        <div class="col-md-6">
            <input class="form-control" placeholder="Title" type="text" name="songs[{{ $song_status }}][{{ $song_id }}][title]" value="{{ $title }}" />
        </div>
    </div>


    <br class="col-xs-11 push-down pull-down" />
</div>