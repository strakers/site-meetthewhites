@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Invites</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-vcard fa-fw"></i> Active Invite List
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
                            <th>Actions</th>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Code</th>
                            <th>Address</th>
                            <th>Email</th>
                            <th>Num Guests</th>
                            <th>Invite List</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($invites->where('deleted_at',false) as $invite)
                            <tr data-id="{{ $invite->id }}">
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ url('/admin/invites/edit/' . $invite->id) }}" class="btn btn-default bt-sm"><i class="fa fa-pencil fa-fw text-success" title="Edit"></i></a>
                                        <a href="{{ url('/admin/invites/remove/' . $invite->id) }}" class="btn btn-default bt-sm"><i class="fa fa-remove fa-fw text-danger" title="Remove"></i></a>
                                    </div>
                                </td>
                                <td>{{ $invite->id }}</td>
                                <td>{{ $invite->name }}</td>
                                <td>{{ $invite->code }}</td>
                                <td>{{ $invite->address() }}</td>
                                <td>{{ $invite->email }}</td>
                                <td>{{ $invite->guests()->count() }}</td>
                                <td>
                                    <button class="btn btn-default view_details" data-id="{{ $invite->id }}" type="button"><span class="text-primary" >View</span></button>
                                    <pre class="hidden invite_list">{{ json_encode( $invite->guests->pluck('name') ) }}</pre>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-trash fa-fw"></i> Disabled Invites
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
                            <th>Restore</th>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Code</th>
                            <th>Address</th>
                            <th>Email</th>
                            <th>Num Guests</th>
                            <th>Invite List</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($invites->where('deleted_at',true) as $invite)
                            <tr>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ url('/admin/invites/restore/' . $invite->id) }}" class="btn btn-default bt-sm"><i class="fa fa-check fa-fw text-success" title="Restore"></i></a>
                                    </div>
                                </td>
                                <td>{{ $invite->id }}</td>
                                <td>{{ $invite->name }}</td>
                                <td>{{ $invite->code }}</td>
                                <td>{{ $invite->address() }}</td>
                                <td>{{ $invite->email }}</td>
                                <td>{{ $invite->guests()->count() }}</td>
                                <td>
                                    <button class="btn btn-default" data-id="{{ $invite->id }}" type="button"><span class="text-primary" >View</span></button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
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
                        json = $(this).siblings('.invite_list').text(),
                        invite_id = $(this).parents('tr').attr('data-id');

                if(data = JSON.parse(json)){
                    if(data.length){
                        content = '<h3>Individual Names</h3><ul class="list-group">';
                        for(var i=0;i<data.length;++i){
                            content += '<li class="list-group-item">'+data[i]+'</li>';
                        }
                        content += '</ul>';
                        if(invite_id){
                            content += '<p><a href="{{ url('/admin/invites/restore') }}/'+invite_id+'">Edit List</a></p>';
                        }
                    }
                }

                bootbox.alert({
                    message: content
                })
            });

        })(jQuery);
    </script>
@endsection