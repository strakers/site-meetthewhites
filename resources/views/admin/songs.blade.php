@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Song Requests <a class="btn btn-primary pull-right" target="download_songs" href="{{ route('song.export') }}"><i class="fa fa-download fa-fw"></i> Export</a></h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3><i class="fa fa-headphones fa-fw"></i> Collective Playlist<code> </code>|<code> {{ count($songs) }} tracks</code></h3>
                </div>
                <div class="list-group">
                    @foreach($songs as $song)
                        <a target="youtube_new" href="{{ 'https://www.youtube.com/results?search_query=' . urlencode($song->artist . '-' . $song->title ) . '&page=&utm_source=api' }}"
                           class="list-group-item"><i class="fa fa-play fa-fw"></i> {{ ucwords($song->artist) }} - {{ ucwords($song->title) }}
                            </a>
                    @endforeach
                </div>
            </div>
            <div>
                <p>
                    <a class="btn btn-primary btn-lg" target="download_songs" href="{{ route('song.export') }}"><i class="fa fa-download fa-fw"></i> Export Songs to File</a>
                </p>
            </div>
        </div>
        <p>&nbsp;</p>
    </div>
@endsection