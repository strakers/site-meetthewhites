@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Responses</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-users fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{ $responded->where('is_attending',true)->count() }}</div>
                            <div>Number Attending</div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="panel-footer">
                        <span class="pull-left">Details Below</span>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>

        @if( true )
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-cutlery fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{ $metadata->fields->where('meta_value',array_get($metadata->options,0,''))->count() }}</div>
                            <div> Meat option</div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="panel-footer">
                        <span class="pull-left">Details Below</span>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-cutlery fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{ $metadata->fields->where('meta_value',array_get($metadata->options,1,''))->count() }}</div>
                            <div> Fish option</div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="panel-footer">
                        <span class="pull-left">Details Below</span>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-times-circle-o fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{ $metadata->fields->where('meta_value',array_get($metadata->options,2,''))->count() }}</div>
                            <div> Not eating</div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="panel-footer">
                        <span class="pull-left">Details Below</span>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-6 col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-comments fa-fw"></i> Guest Responses
                </div>
                <div class="panel-body">
                    <div class="input-group custom-search-form">
                        <input type="text" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                    </div>
                    <BR />
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Invite Name</th>
                                <th>Guest Name</th>
                                <th>Attending</th>
                                <th>Details</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($responded->where('deleted_at',false) as $inviteGuest)
                                @if( $inviteGuest->invite )
                                <tr>
                                    <td>{{ $inviteGuest->id }}</td>
                                    <td>{{ $inviteGuest->invite->name }}</td>
                                    <td>{{ $inviteGuest->name }}</td>
                                    <td>{{ $inviteGuest->is_attending ? 'Yes' : 'No' }}</td>
                                    <td>
                                        <button class="btn btn-default view_details" data-id="{{ $inviteGuest->id }}" type="button"><span class="text-primary" >View</span></button>
                                        <pre class="hidden meta_options">{{ json_encode( $inviteGuest->fields->pluck('meta_value') ) }}</pre>
                                    </td>
                                </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-clock-o fa-fw"></i> Response Timeline
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <ul class="timeline">
                        @foreach($responded->where('deleted_at',false)->sortByDesc('responded_at')->groupBy('invite_id') as $inviteGroup)
                            @if( $inviteGroup[0]->invite )
                            <li class="{{ $loop->index % 2 === 0 ? ' timeline-inverted' : '' }}">
                                <div class="timeline-badge info"><i class="fa fa-user-circle-o"></i>
                                </div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4 class="timeline-title">{{ $inviteGroup[0]->invite->name }} <span class="text-muted">Party</span></h4>
                                        <p><small class="text-muted"><i class="fa fa-clock-o"></i> {{ $inviteGroup[0]->getLastUpdatedSince() }}</small>
                                        </p>
                                    </div>
                                    <div class="timeline-body">
                                        <ul class="list-group">
                                            @foreach($inviteGroup as $inviteGuest)
                                            <li class="list-group-item">
                                                <span>{{ $inviteGuest->name }} | </span>
                                                @if($inviteGuest->is_attending)
                                                    <span class="text-success">attending</span>
                                                @else
                                                    <span class="text-danger">can't make it</span>
                                                @endif
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
                <!-- /.panel-body -->
            </div>
        </div>
    </div>
    <!-- /.row -->
@endsection

@section('scripts')
    <script type="text/javascript">
        (function($){

            $('.view_details').on('click',function(e){
                var content = '<p>No details available.</p>',
                    data = null,
                    json = $(this).siblings('.meta_options').text(),
                    options = ['Food Option','Dietary Restrictions'];

                if(data = JSON.parse(json)){
                    if(data.length){
                        content = '<h3>Details</h3><table class="table table-striped table-bordered">';
                        for(var i=0;i<data.length;++i){
                            content += '<tr><td><strong>'+(options[i]?options[i]:'Option')+'</strong></td><td>'+data[i]+'</td></tr>';
                        }
                        content += '</table>';
                    }
                }

                bootbox.alert({
                    message: content
                })
            });

        })(jQuery);
    </script>
@endsection