@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Not Responded</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-vcard fa-fw"></i> Outstanding List
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
@endsection