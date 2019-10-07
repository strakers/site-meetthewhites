@extends('layouts.main')

@section('styles')
    <style type="text/css">
        .comment.expression { margin-bottom: 1em; }
        .grid-sizer,
        .grid-item { width: 20%; }
        /* 2 columns wide */
        .grid-item--width2 { width: 40%; }
    </style>
@endsection

@section('scripts')
    {{--<script src="//unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
    <script>
        $('.expression-holder').masonry({
            // options...
            itemSelector: '.comment.expression',
            columnWidth: 200
        });

    </script>--}}
@endsection

@section('content')
    <div class="bordered-wrapper first pull-down" xmlns="http://www.w3.org/1999/html">
        <div class="container banner" data-image="{{ asset('images/gallery') }}/meetthewhites_churchkiss-min.jpg" data-pos="50% 36%" data-top="42%">
            <div class="content title">
                Share With Us
                <div class="sub-title"></div>
            </div>
        </div>
    </div>

    <div class="container pull-down push-down">
        <div class="content basket row" role="main">

            <p>Please write any messages, well wishes, or advice for the newlyweds!</p>

            <div class="col-md-8 col-xs-12 push-down">
                <div class="crew-members">
                    <h3 class="crew-group heading">Comments</h3>
                    <div class="row">
                        <div class="col-xs-12">
                            <form class="form-horizontal{{ $errors->has('name') ? ' has-error' : '' }}" role="form" method="POST" action="{{ route('share.comments') }}">
                                {{ csrf_field() }}
                                <div class="form-group row">
                                    <div class="col-md-4 text-left">
                                        <label for="email" class="control-label required">Your Name</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input id="commenter_name" type="text" name="name" class="form-control outline" placeholder="" />
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-4 text-left">
                                        <label for="email" class="control-label required">Comment</label>
                                    </div>
                                    <div class="col-md-6">
                                        <textarea id="commenter_text" rows="6" name="comment" class="form-control outline" placeholder="">
                                        </textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12 push-down">
                                        <button type="submit" class="btn btn-primary btn-lg btn-themed">Submit</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-xs-12 push-down ">
                <div class="crew-members">
                    <h3 class="crew-group heading">Media</h3>
                    <div class="row">
                        <div class="col-xs-12">
                            <p>If you have a public instagram profile, upload your photos with the hashtag <em class="gold-soft">#meetthewhites2017</em>, and we'll automatically pull your photos into the <a href="media">photo gallery</a>.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if( $comments->count() )
        <div class="bordered-wrapper first"></div>

        <div class="container pull-down push-down">
            <div role="main" class="content basket">
                <h2 class="heading">Your Words</h2>
            </div>
        </div>

        <div class="container pull-down">

            <div class="content basket row expression-holder" role="main">

                @foreach($comments as $comment)
                    <div class="col-md-4 comment expression">
                        <div class="bordered">
                            <p>{{ $comment->expression }}</p>
                            <p class="text-right">- <em>{{ $comment->name }}</em></p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    @endif

    <div class="bordered-wrapper first clearfix"></div>

@endsection