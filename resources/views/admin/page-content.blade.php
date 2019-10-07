@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Page Content :: {{ $page->name }}</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        @if($page->boxes->count())
            @foreach($page->boxes as $block)
                <div class="col-lg-4 col-sm-6 col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-file-text-o fa-fw"></i> {{ $block->name }}
                        </div>
                        <div class="panel-body">
                            <div class="wysiwyg page-content" data-id="{{ $block->id }}" data-name="{{ $block->name }}">{!! $block->content !!}</div>
                            <button class="btn btn-success block-update" type="button">Update</button>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="col-xs-12">
                <p>There are no content blocks for this page. <a href="{{ url('/admin/pages') }}">See the page directory</a>.</p>
            </div>
        @endif
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

            $('.block-update').on('click',function(e){
                var wysiwyg = $(this).siblings('.wysiwyg').first(),
                    id = wysiwyg.attr('data-id'),
                    name = wysiwyg.attr('data-name'),
                    content = wysiwyg.summernote('code')
                ;

                swal({
                    title: 'Update '+name+'?',
                    type: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Submit',
                    showLoaderOnConfirm: true,
                    preConfirm: function(data){
                        return new Promise(function(resolve,reject){
                            $.post('{{ url('/admin/pages/update') }}',{ id: id, text: content, '_token':window.Laravel.csrfToken })
                            .done(function( response ) {
                                console.log( 'success', response );
                                resolve();
                            })
                            .fail(function( error ) {
                                var messages = '';
                                for(var s in error.responseJSON){
                                    messages += error.responseJSON[s][0] + ' ';
                                }
                                reject( messages );
                            });
                        });
                    }
                }).then(function( data ){
                    console.log( 'final', data );
                    swal(
                            'Success!',
                            name+' was updated.',
                            'success'
                    );
                },function(dismiss){});
            });

        })(jQuery);
    </script>
@endsection