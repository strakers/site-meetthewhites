@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Meta Fields</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-gear fa-fw"></i> Active Field List
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Actions</th>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Type</th>
                                <th>Options</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($metadata->whereStrict('deleted_at',null) as $meta)
                                <tr>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ url('/admin/meta/edit/' . $meta->id) }}" class="btn btn-default bt-sm"><i class="fa fa-pencil fa-fw text-success" title="Edit"></i></a>
                                            <a href="{{ url('/admin/meta/remove/' . $meta->id) }}" class="btn btn-default bt-sm delete-confirm"><i class="fa fa-remove fa-fw text-danger" title="Remove"></i></a>
                                        </div>
                                    </td>
                                    <td>{{ $meta->id }}</td>
                                    <td>{{ $meta->name }}</td>
                                    <td>{{ $meta->slug }}</td>
                                    <td>{{ $meta->fieldType->name }}</td>
                                    <td width="50%">{!! $meta->options && !is_string($meta->options) ? array_to_list($meta->options) : 'n/a' !!}</td>
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
                    <i class="fa fa-trash fa-fw"></i> Deleted Fields
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Restore</th>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Type</th>
                                <th>Options</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($metadata->where('deleted_at',true) as $meta)
                                <tr class="text-danger">
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ url('/admin/meta/restore/' . $meta->id) }}" class="btn btn-default bt-sm"><i class="fa fa-check fa-fw text-info" title="Restore"></i></a>
                                        </div>
                                    </td>
                                    <td>{{ $meta->id }}</td>
                                    <td>{{ $meta->name }}</td>
                                    <td>{{ $meta->slug }}</td>
                                    <td>{{ $meta->fieldType->name }}</td>
                                    <td width="50%">{!! $meta->options && !is_string($meta->options) ? array_to_list($meta->options) : 'n/a' !!}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection