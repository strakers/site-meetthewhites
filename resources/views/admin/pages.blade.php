@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Manage Pages</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        {{--<pre>{{ var_export($block) }}</pre>--}}
        <div class="col-lg-6 col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-sitemap fa-fw"></i> Pages
                </div>
                <div class="panel-body">
                    <div class="list-group">
                        @foreach($pages as $page)
                            <a class="list-group-item" href="{{ url('/admin/pages/' . $page->id) }}">
                                <i class="fa fa-file-o">&nbsp;</i> <span>{{ $page->name }}</span> <span class="fa arrow"></span>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-info fa-fw"></i> Description
                </div>
                <div class="panel-body">
                    <p>The content on the front-end pages, which are visible to your guests, can be managed from this section. Each page has a list of content blocks, and each content block contains the text for a specific section of that page. </p>
                </div>
            </div>
        </div>
    </div>

    <!-- /.row -->
@endsection

@section('scripts')
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.3/summernote.js"></script>
    <script type="text/javascript">
        (function($){

            $('.wysiwyg').summernote({
                height: 200
            });

        })(jQuery);
    </script>
@endsection